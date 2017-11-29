<?php

namespace Wk\AfterbuyApiBundle\Tests\Services\Xml;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wk\AfterbuyApiBundle\Model\XmlApi\Error;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\BillingAddress;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\BuyerInfo;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\GetSoldItemsResponse;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Order as GetSoldItemsOrder;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Result as GetSoldItemsResult;
use Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\ShippingAddress;
use Wk\AfterbuyApiBundle\Model\XmlApi\Result as UpdateSoldItemsResult;
use Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\Order as UpdateSoldItemsOrder;
use Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems\UpdateSoldItemsResponse;
use Wk\AfterbuyApiBundle\Services\Xml\Client;

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
     * Set up before each test
     */
    protected function setUp()
    {
        $this->client = new Client('test-user', 'user-password', 123456789, 'partner-password', 'en');
        parent::setUp();
    }

    /**
     * @return array
     */
    public function provideStatusCodes()
    {
        return [
            [300],
            [301],
            [400],
            [404],
            [500]
        ];
    }

    /**
     * Tests unavailable GetSoldItems action of the Afterbuy XML API
     *
     * @param int $statusCode
     *
     * @dataProvider provideStatusCodes
     */
    public function testGetSoldItemsUnavailability($statusCode)
    {
        $this->setMockHandlerForUnavailabilityTest($statusCode);

        $this->assertNull($this->client->getSoldItems());
    }

    /**
     * Tests an error throwing GetSoldItems request of the Afterbuy XML Client
     */
    public function testGetSoldItemsError()
    {
        $this->setMockHandlerForErrorTest('GetSoldItems/ResponseOnError.xml');

        $soldItems = $this->client->getSoldItems();
        $this->assertInstanceOf(GetSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(GetSoldItemsResult::class, $result);
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
        $this->setMockHandlerForSuccessTest('GetSoldItems/ResponseOnSuccessBuyerInfo.xml');

        $soldItems = $this->client->getSoldItems();
        $this->assertInstanceOf(GetSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(GetSoldItemsResult::class, $result);
        $this->assertEmpty($result->getErrors());

        $orders = $result->getOrders();
        $this->assertContainsOnlyInstancesOf(GetSoldItemsOrder::class, $orders);
        $this->assertCount(1, $orders);

        /** @var GetSoldItemsOrder $order */
        $order = reset($orders);
        $this->assertInstanceOf(GetSoldItemsOrder::class, $order);
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
     * Tests unavailable UpdateSoldItems action of the Afterbuy XML API
     *
     * @param int $statusCode
     *
     * @dataProvider provideStatusCodes
     */
    public function testUpdateSoldItemsUnavailability($statusCode)
    {
        $this->setMockHandlerForUnavailabilityTest($statusCode);

        $this->assertNull($this->client->updateSoldItems([new UpdateSoldItemsOrder()]));
    }

    /**
     * Tests an error throwing UpdateSoldItems request of the Afterbuy XML Client
     */
    public function testUpdateSoldItemsError()
    {
        $this->setMockHandlerForErrorTest('UpdateSoldItems/ResponseOnError.xml');

        $soldItems = $this->client->updateSoldItems([new UpdateSoldItemsOrder()]);
        $this->assertInstanceOf(UpdateSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(UpdateSoldItemsResult::class, $result);

        $errors = $result->getErrors();
        $this->assertContainsOnlyInstancesOf(Error::class, $errors);
        $this->assertCount(2, $errors);

        /** @var Error $error */
        $error = reset($errors);
        $this->assertEquals(11, $error->getErrorCode());
        $this->assertEquals('something failed', $error->getErrorDescription());
        $this->assertEquals('something really failed', $error->getErrorLongDescription());
    }

    /**
     * Tests a successful UpdateSoldItems request of the Afterbuy XML Client
     */
    public function testUpdateSoldItemsSuccess()
    {
        $this->setMockHandlerForSuccessTest('UpdateSoldItems/ResponseOnSuccess.xml');

        $soldItems = $this->client->updateSoldItems([new UpdateSoldItemsOrder()]);
        $this->assertInstanceOf(UpdateSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(UpdateSoldItemsResult::class, $result);
        $this->assertEmpty($result->getErrors());
    }

    /**
     * @param int $statusCode
     */
    private function setMockHandlerForUnavailabilityTest($statusCode)
    {
        $mock = new MockHandler([
            new Response($statusCode)
        ]);

        $handler = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handler]);
        $clientReflection = new \ReflectionProperty(Client::class, 'client');
        $clientReflection->setAccessible(true);
        $clientReflection->setValue($this->client, $guzzle);
    }

    /**
     * @param string $pathToXmlFile
     */
    private function setMockHandlerForErrorTest($pathToXmlFile)
    {
        $xml = file_get_contents(__DIR__ . '/../../Data/' . $pathToXmlFile);
        $headers = ['Content-Type:' => 'text/xml', 'Content-Length' => strlen($xml)];
        $response = new Response(200, $headers, $xml);
        $mock = new MockHandler([$response]);
        $handler = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handler]);
        $clientReflection = new \ReflectionProperty(Client::class, 'client');
        $clientReflection->setAccessible(true);
        $clientReflection->setValue($this->client, $guzzle);
    }

    /**
     * @param string $pathToXmlFile
     */
    private function setMockHandlerForSuccessTest($pathToXmlFile)
    {
        $xml = file_get_contents(__DIR__ . '/../../Data/' . $pathToXmlFile);
        $headers = ['Content-Type:' => 'text/xml', 'Content-Length' => strlen($xml)];
        $response = new Response(200, $headers, $xml);
        $mock = new MockHandler([$response]);
        $handler = HandlerStack::create($mock);
        $guzzle = new \GuzzleHttp\Client(['handler' => $handler]);
        $clientReflection = new \ReflectionProperty(Client::class, 'client');
        $clientReflection->setAccessible(true);
        $clientReflection->setValue($this->client, $guzzle);
    }
}
