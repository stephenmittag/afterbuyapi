<?php

namespace Wk\AfterbuyApiBundle\Tests\Services\Xml;

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
        $this->setMockForUnavailabilityTest($statusCode);

        $this->assertNull($this->client->getSoldItems());
    }

    /**
     * Tests an error throwing GetSoldItems request of the Afterbuy XML Client
     */
    public function testGetSoldItemsError()
    {
        $this->setMockForErrorTest('GetSoldItems/ResponseOnError.xml');

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
        $this->setMockForSuccessTest('GetSoldItems/ResponseOnSuccessBuyerInfo.xml');

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
        $this->setMockForUnavailabilityTest($statusCode);

        $this->assertNull($this->client->updateSoldItems([new UpdateSoldItemsOrder()]));
    }

    /**
     * Tests an error throwing UpdateSoldItems request of the Afterbuy XML Client
     */
    public function testUpdateSoldItemsError()
    {
        $this->setMockForErrorTest('UpdateSoldItems/ResponseOnError.xml');

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
        $this->setMockForSuccessTest('UpdateSoldItems/ResponseOnSuccess.xml');

        $soldItems = $this->client->updateSoldItems([new UpdateSoldItemsOrder()]);
        $this->assertInstanceOf(UpdateSoldItemsResponse::class, $soldItems);

        $result = $soldItems->getResult();
        $this->assertInstanceOf(UpdateSoldItemsResult::class, $result);
        $this->assertEmpty($result->getErrors());
    }

    /**
     * @param int $statusCode
     */
    private function setMockForUnavailabilityTest($statusCode)
    {
        $mock = $this->createMockClient($statusCode);
        $clientReflection = new \ReflectionProperty(Client::class, 'client');
        $clientReflection->setAccessible(true);
        $clientReflection->setValue($this->client, $mock);
    }

    /**
     * @param string $pathToXmlFile
     */
    private function setMockForErrorTest($pathToXmlFile)
    {
        $xml = file_get_contents(__DIR__ . '/../../Data/' . $pathToXmlFile);
        $headers = ['Content-Type:' => 'text/xml', 'Content-Length' => strlen($xml)];
        $mock = $this->createMockClient(200, $headers, $xml);
        $clientReflection = new \ReflectionProperty(Client::class, 'client');
        $clientReflection->setAccessible(true);
        $clientReflection->setValue($this->client, $mock);
    }

    /**
     * @param string $pathToXmlFile
     */
    private function setMockForSuccessTest($pathToXmlFile)
    {
        $xml = file_get_contents(__DIR__ . '/../../Data/' . $pathToXmlFile);
        $headers = ['Content-Type:' => 'text/xml', 'Content-Length' => strlen($xml)];
        $mock = $this->createMockClient(200, $headers, $xml);
        $clientReflection = new \ReflectionProperty(Client::class, 'client');
        $clientReflection->setAccessible(true);
        $clientReflection->setValue($this->client, $mock);
    }

    /**
     * @param int   $statusCode
     * @param array $headers
     * @param null  $body
     *
     * @return \GuzzleHttp\Client
     */
    private function createMockClient($statusCode = 200, array $headers = array(), $body = null)
    {
        if (version_compare(\GuzzleHttp\Client::VERSION, '6.0.0', '<')) {
            // Guzzle 5
            $stream = \GuzzleHttp\Stream\Stream::factory($body);
            $response = new \GuzzleHttp\Message\Response($statusCode, $headers, $stream);
            $mock = new \GuzzleHttp\Subscriber\Mock([$response]);
            $client = new \GuzzleHttp\Client();
            $client->getEmitter()->attach($mock);

            return $client;
        }

        // Guzzle 6
        $response = new \GuzzleHttp\Psr7\Response($statusCode, $headers, $body);
        $mock = new \GuzzleHttp\Handler\MockHandler([$response]);
        $handler = \GuzzleHttp\HandlerStack::create($mock);

        return new \GuzzleHttp\Client(['handler' => $handler]);
    }
}
