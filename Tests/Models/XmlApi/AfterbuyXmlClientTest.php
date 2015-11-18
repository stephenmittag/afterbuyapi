<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi;

use Wk\AfterbuyApi\Models\XmlApi\AbstractXmlWebservice;
use Wk\AfterbuyApi\Services\AfterbuyXmlClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Wk\AfterbuyApi\Models\XmlApi;

/**
 * Class AfterbuyXmlClientTest
 */
class AfterbuyXmlClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AfterbuyXmlClient
     */
    private $afterbuyClient;

    /**
     * @var Client
     */
    private $httpClient;

    /**
     * @var AbstractXmlWebservice
     */
    private $soldItemsUpdate;

    /**
     * @var AbstractXmlWebservice
     */
    private $soldItemsList;

    /**
     * @var array
     */
    private $testCredentials;

    /**
     * initialized the global variables
     */
    public function setUp()
    {
        $this->afterbuyClient = new AfterbuyXmlClient();
        $this->httpClient = new Client();
        $this->soldItemsUpdate = new XmlApi\SoldItemsUpdate();
        $this->soldItemsList = new XmlApi\SoldItemsList();

        $this->testCredentials = array(
            'partner_id'   => '',
            'partner_pass' => '',
            'user_id'      => '',
            'user_pass'    => ''
        );
    }

    /**
     * test if setter returns an instance of afterbuyXmlClient
     */
    public function testSetCredentials()
    {
        $result = $this->afterbuyClient->setCredentials($this->testCredentials);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $result);
    }

    /**
     * test if getter returns the same credentials
     */
    public function testGetCredentials()
    {
        $this->afterbuyClient->setCredentials($this->testCredentials);

        $this->assertSame($this->testCredentials, $this->afterbuyClient->getCredentials());
    }

    /**
     * test if setter returns an instance of afterbuyXmlClient
     */
    public function testSetHttpClient()
    {
        $result = $this->afterbuyClient->setHttpClient($this->httpClient);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $result);
    }

    /**
     * test if getter returns an instance of afterbuyXmlClient
     */
    public function testGetHttpClient()
    {
        $this->afterbuyClient->setHttpClient($this->httpClient);

        $this->assertInstanceOf('GuzzleHttp\Client', $this->afterbuyClient->getHttpClient());
    }

    /**
     * test if send method returns an instance of SimpleXMLElement and correct content
     */
    public function testSend()
    {
        $body = '<result><e>gbff</e></result>';
        $mock = new MockHandler([
            new Response(200, ['X-Foo' => 'Bar'], $body)
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $this->afterbuyClient->setServiceProvider($this->soldItemsUpdate)
                             ->setCredentials($this->testCredentials)
                             ->setUri('foo')
                             ->setHttpClient($client);

        $response = $this->afterbuyClient->send();

        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('gbff', (string)$response->e);
    }

    /**
     * test if setter returns an instance of afterbuyXmlClient
     */
    public function testSetUri()
    {
        $result = $this->afterbuyClient->setUri('foo');

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $result);
    }

    /**
     * test if getter returns the same uri
     */
    public function testGetUri()
    {
        $this->afterbuyClient->setUri('foo_bar');

        $this->assertSame('foo_bar', $this->afterbuyClient->getUri());
    }

    /**
     * test setter returns an instance of AfterbuyXmlClient
     */
    public function testSetServiceProvider()
    {
        $result = $this->afterbuyClient->setServiceProvider($this->soldItemsList);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $result);
    }

    /**
     * test if getter returns an instance of SoldItemsList
     */
    public function testGetServiceProvider()
    {
        $this->afterbuyClient->setServiceProvider($this->soldItemsList);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsList', $this->afterbuyClient->getServiceProvider());
    }
}