<?php

use Wk\AfterbuyApi\Services\AfterbuyXmlClient;
use GuzzleHttp\Client;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use Wk\AfterbuyApi\Models\XmlApi;



class AfterbuyXmlClientTest  extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->afterbuyClient = new AfterbuyXmlClient();
        $this->httpClient = new Client();
        $this->soldItemsUpdate = new XmlApi\SoldItemsUpdate();
        $this->soldItemsList = new XmlApi\SoldItemsList();

        $this->testcredentials = $testCredentials = array('partner_id' => '',
                                                          'partner_pass'=> '',
                                                          'user_id' => '',
                                                          'user_pass' => '');
    }

    public function testSetCredentials()
    {
        $result = $this->afterbuyClient->setCredentials($this->testcredentials);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient',$result);
    }

    public function testGetCredentials()
    {
        $this->afterbuyClient->setCredentials($this->testcredentials);

        $this->assertSame($this->testcredentials, $this->afterbuyClient->getCredentials());
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
        $body = GuzzleHttp\Stream\Stream::factory('<result><e>gbff</e></result>');
        $mock = new Mock([
            new Response(200, ['X-Foo' => 'Bar'],$body),         // Use response object
            "HTTP/1.1 202 OK\r\nContent-Length: 0\r\n\r\n"  // Use a response string
        ]);

        $this->httpClient->getEmitter()
                         ->attach($mock);

        $testCredentials = array('partner_id' => '',
                                 'partner_pass'=> '',
                                 'user_id' => '',
                                 'user_pass' => '');

        $this->afterbuyClient->setServiceProvider($this->soldItemsUpdate)
                             ->setCredentials($testCredentials)
                             ->setUri('foo')
                             ->setHttpClient($this->httpClient);

        $result = $this->afterbuyClient->send();

        $this->assertInstanceOf('SimpleXMLElement',$result);
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