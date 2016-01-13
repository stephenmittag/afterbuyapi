<?php

namespace WK\AfterbuyApi\Tests\Services\Xml;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wk\AfterbuyApi\Model\XmlApi\Error;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\BillingAddress;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\BuyerInfo;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\GetSoldItemsResponse;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Order;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Result;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\ShippingAddress;
use Wk\AfterbuyApi\Services\Xml\Client;

/**
 * Class ClientTest
 */
class ClientTest extends WebTestCase
{
    /**
     * @var Client
     */
    private $client;

    /**
     * Tests unavailable GetSoldItems action of the Afterbuy XML API
     */
    public function testGetSoldItemsUnavailability()
    {
        $mock = new MockHandler([
            new Response(300),
            new Response(301),
            new Response(400),
            new Response(404),
            new Response(500),
        ]);

        $handler = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->client->setClient($guzzle);

        $this->assertNull($this->client->getSoldItems());
        $this->assertNull($this->client->getSoldItems());
        $this->assertNull($this->client->getSoldItems());
        $this->assertNull($this->client->getSoldItems());
        $this->assertNull($this->client->getSoldItems());
    }

    /**
     * Tests an error throwing GetSoldItems request of the Afterbuy XML Client
     */
    public function testGetSoldItemsError()
    {
        $xml = file_get_contents(__DIR__ . '/../../Data/GetSoldItems/ResponseOnError.xml');
        $headers = ['Content-Type:' => 'text/xml', 'Content-Length' => strlen($xml)];
        $response = new Response(200, $headers, $xml);
        $mock = new MockHandler([$response]);
        $handler = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->client->setClient($guzzle);

        $soldItems = $this->client->getSoldItems();
        $this->assertInstanceOf(GetSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(Result::class, $result);
        $this->assertEmpty($result->getOrders());

        $errors = $result->getErrors();
        $this->assertContainsOnlyInstancesOf(Error::class, $errors);
        $this->assertCount(1, $errors);

        /** @var Error $error */
        $error = reset($errors);
        $this->assertEquals(11, $error->getErrorCode());
        $this->assertEquals('something failed', $error->getErrorDescription());
        $this->assertEquals('something really failed', $error->getErrorLongDescription());
    }

    /**
     * Tests a successful GetSoldItems request of the Afterbuy XML Client
     */
    public function testGetSoldItemsSuccess()
    {
        $xml = file_get_contents(__DIR__ . '/../../Data/GetSoldItems/ResponseOnSuccessBuyerInfo.xml');
        $headers = ['Content-Type:' => 'text/xml', 'Content-Length' => strlen($xml)];
        $response = new Response(200, $headers, $xml);
        $mock = new MockHandler([$response]);
        $handler = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->client->setClient($guzzle);

        $soldItems = $this->client->getSoldItems();
        $this->assertInstanceOf(GetSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(Result::class, $result);
        $this->assertEmpty($result->getErrors());

        $orders = $result->getOrders();
        $this->assertContainsOnlyInstancesOf(Order::class, $orders);
        $this->assertCount(1, $orders);

        /** @var Order $order */
        $order = reset($orders);
        $this->assertInstanceOf(Order::class, $order);
        $this->assertNull($order->getAdditionalInfo());
        $this->assertNull($order->getPaymentInfo());
        $this->assertNull($order->getShippingInfo());

        $buyerInfo = $order->getBuyerInfo();
        $this->assertInstanceOf(BuyerInfo::class, $buyerInfo);

        $billingAddress = $buyerInfo->getBillingAddress();
        $this->assertInstanceOf(BillingAddress::class, $billingAddress);
        $this->assertEquals(123, $billingAddress->getAfterbuyUserId());
        $this->assertEquals(1234, $billingAddress->getAfterbuyUserIdAlt());
        $this->assertEquals('user id platform', $billingAddress->getUserIdPlatform());
        $this->assertEquals('firstname', $billingAddress->getFirstName());
        $this->assertEquals('lastname', $billingAddress->getLastName());
        $this->assertEquals('title', $billingAddress->getTitle());
        $this->assertEquals('company', $billingAddress->getCompany());
        $this->assertEquals('street', $billingAddress->getStreet());
        $this->assertEquals('street 2', $billingAddress->getStreet2());
        $this->assertEquals('abc123', $billingAddress->getPostalCode());
        $this->assertEquals('state', $billingAddress->getStateOrProvince());
        $this->assertEquals('city', $billingAddress->getCity());
        $this->assertEquals('phone', $billingAddress->getPhone());
        $this->assertEquals('country', $billingAddress->getCountry());
        $this->assertEquals('de', $billingAddress->getCountryIso());
        $this->assertEquals('fax', $billingAddress->getFax());
        $this->assertEquals('test@test.de', $billingAddress->getMail());
        $this->assertFalse($billingAddress->isMerchant());
        $this->assertEquals('tax id number', $billingAddress->getTaxIdNumber());

        $shippingAddress = $buyerInfo->getShippingAddress();
        $this->assertInstanceOf(ShippingAddress::class, $shippingAddress);
        $this->assertEquals('firstname2', $shippingAddress->getFirstName());
        $this->assertEquals('lastname2', $shippingAddress->getLastName());
        $this->assertEquals('company2', $shippingAddress->getCompany());
        $this->assertEquals('street2', $shippingAddress->getStreet());
        $this->assertEquals('street 22', $shippingAddress->getStreet2());
        $this->assertEquals('abc1232', $shippingAddress->getPostalCode());
        $this->assertEquals('state2', $shippingAddress->getStateOrProvince());
        $this->assertEquals('city2', $shippingAddress->getCity());
        $this->assertEquals('phone2', $shippingAddress->getPhone());
        $this->assertEquals('country2', $shippingAddress->getCountry());
        $this->assertEquals('es', $shippingAddress->getCountryIso());
    }

    /**
     * Set up before each test
     */
    protected function setUp()
    {
        /** @var SerializerInterface $serializer */
        $serializer = static::createClient()->getContainer()->get('serializer');
        $this->client = new Client('test-user', 'user-password', 123456789, 'partner-password', 'en');
        $this->client->setSerializer($serializer);

        parent::setUp();
    }
}
