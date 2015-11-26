<?php

namespace Wk\AfterbuyApi\Tests\Services;

use Wk\AfterbuyApi\Models\XmlApi\AbstractXmlWebservice;
use Wk\AfterbuyApi\Models\XmlApi\SoldItemsList;
use Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate;
use Wk\AfterbuyApi\Services\AfterbuyXmlClient;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

/**
 * Class AfterbuyXmlClientTest
 */
class AfterbuyXmlClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AfterbuyXmlClient
     */
    private $afterbuyXmlClient;

    /**
     * @var array
     */
    private $testCredentials;

    /**
     * @var AbstractXmlWebservice
     */
    private $soldItemsUpdate;

    /**
     * initialize the global variables
     */
    public function setUp()
    {
        $this->afterbuyXmlClient = new AfterbuyXmlClient();
        $this->soldItemsUpdate = $this->getSoldItemsUpdate();
        $this->testCredentials = $this->getTestCredentials();
    }

    /**
     * @return array
     */
    public function dataSetterAndGetter()
    {
        $client = new Client();
        $soldItemsList = new SoldItemsList();
        $testCredentials = $this->getTestCredentials();
        $soldItemsUpdate = $this->getSoldItemsUpdate();

        return array(
            array('setCredentials', $testCredentials, 'getCredentials', $testCredentials),
            array('setHttpClient', $client, 'getHttpClient', $client),
            array('setUri', 'foo', 'getUri', 'foo'),
            array('setServiceProvider', $soldItemsList, 'getServiceProvider', $soldItemsList),
            array('setServiceProvider', $soldItemsUpdate, 'getServiceProvider', $soldItemsUpdate)
        );
    }

    /**
     * @param string $setter
     * @param mixed  $setterValue
     * @param string $getter
     * @param mixed  $expectedGetterValue
     *
     * @dataProvider dataSetterAndGetter
     */
    public function testSetterAndGetter($setter, $setterValue, $getter, $expectedGetterValue)
    {
        $afterbuyXmlClient = $this->afterbuyXmlClient->{$setter}($setterValue);

        $this->assertInstanceOf('Wk\AfterbuyApi\Services\AfterbuyXmlClient', $afterbuyXmlClient);

        $this->assertSame($expectedGetterValue, $this->afterbuyXmlClient->{$getter}());
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

        $this->afterbuyXmlClient->setServiceProvider($this->soldItemsUpdate)
            ->setCredentials($this->testCredentials)
            ->setUri('foo')
            ->setHttpClient($client);

        $response = $this->afterbuyXmlClient->send();

        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('gbff', (string)$response->e);
    }

    /**
     * @return array
     */
    private function getTestCredentials() {
        return array(
            'partner_id' => '',
            'partner_pass' => '',
            'user_id' => '',
            'user_pass' => ''
        );
    }

    /**
     * @return SoldItemsUpdate
     */
    private function getSoldItemsUpdate() {
        return new SoldItemsUpdate();
    }
}