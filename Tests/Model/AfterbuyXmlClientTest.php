<?php

use Wk\AfterbuyApi\Services\AfterbuyXmlClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Wk\AfterbuyApi\Models\XmlApi;



class AfterbuyXmlClientTest  extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->afterbuyClient = new AfterbuyXmlClient();
        $this->httpClient = new Client();
        $this->soldItemsUpdate = new XmlApi\SoldItemsUpdate();
        $this->soldItemsList = new XmlApi\SoldItemsList();

        $this->testCredentials = array('partner_id' => '',
                                       'partner_pass'=> '',
                                       'user_id' => '',
                                       'user_pass' => '');
    }

    public function testSetCredentials()
    {
        $result = $this->afterbuyClient->setCredentials($this->testCredentials);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient',$result);
    }

    public function testGetCredentials()
    {
        $this->afterbuyClient->setCredentials($this->testCredentials);

        $this->assertSame($this->testCredentials, $this->afterbuyClient->getCredentials());
    }

    public function testSetHttpClient()
    {
        $result = $this->afterbuyClient->setHttpClient($this->httpClient);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $result);
    }

    public function testGetHttpClient()
    {
        $this->afterbuyClient->setHttpClient($this->httpClient);

        $this->assertInstanceOf('GuzzleHttp\Client', $this->afterbuyClient->getHttpClient());
    }

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
    }

    public function testSetUri()
    {
        $result = $this->afterbuyClient->setUri('foo');

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient',$result);
    }

    public function testGetUri()
    {
        $this->afterbuyClient->setUri('foo_bar');

        $this->assertSame('foo_bar',$this->afterbuyClient->getUri());
    }

    public function testSetServiceProvider()
    {
        $result = $this->afterbuyClient->setServiceProvider($this->soldItemsList);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $result);
    }

    public function testGetServiceProvider()
    {
        $this->afterbuyClient->setServiceProvider($this->soldItemsList);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsList', $this->afterbuyClient->getServiceProvider());
    }
}