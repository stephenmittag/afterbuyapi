<?php


namespace Wk\AfterBuyBundle\Tests\Lib;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Guzzle\Http\Message\Response;
use Guzzle\Plugin\Mock\MockPlugin;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;
use Wk\AfterBuyBundle\Lib\AfterBuyConnection;

/**
 * Class AfterBuyConnectionTest
 */
class AfterBuyConnectionTest extends WebTestCase
{

    /**
     * Test for the executeCommand method
     */
    public function testExecuteCommand ()
    {
        $jsonRequest = '{ "allItem": false, "filters": [ { "type": "order", "id": "334996053" } ] }';

        $xmlResponse = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<Afterbuy>
    <CallStatus>Success</CallStatus>
    <CallName>getSoldItems</CallName>
    <Result>
        <Field>Test</Field>
    </Result>
</Afterbuy>
XML;

        $client = new Client();
        $client->setDescription(ServiceDescription::factory(__DIR__. "/../../Resources/config/service.json"));

        $mock = new MockPlugin();
        $mock->addResponse(new Response(
            200,
            array(
                'Location'     => 'afterbuy.de',
                'Content-Type' => 'application/json',
            ),
            $xmlResponse
        ));

        $client->addSubscriber($mock);

        // Create the command and supply the input
        $command = $client->getCommand('getSoldItems', json_decode($jsonRequest, true));
        $this->assertTrue($command->getResponse()->isSuccessful());
        $this->assertEquals('application/json', $command->getResponse()->getContentType());

        $result = $command->getResult()->toArray();
        $this->assertArrayHasKey("CallStatus", $result);
        $this->assertEquals("Success", $result['CallStatus']);

    }

    /**
     * Test for sendNotification method
     */
    public function testSendNotification ()
    {
        $xmlString = <<<XML
<?xml version='1.0'?>
<document>
 <success>1</success>
 <title>Forty What?</title>
 <from>Joe</from>
 <to>Jane</to>
 <body>
  I know that's the answer -- but what's the question?
 </body>
</document>
XML;

        $api = new AfterBuyConnection();
        $logger = $this->getMockBuilder('Monolog\Logger')
                       ->disableOriginalConstructor()
                       ->getMock();

        $api->setLogger($logger);
        $client = new Client();

        $mock = new MockPlugin();
        $mock->addResponse(new Response(
            200,
            array(
                'Location' => 'https://api.afterbuy.de/afterbuy/ShopInterfaceUTF8.aspx',
            ),
            $xmlString
        ));

        $client->addSubscriber($mock);

        $request = $client->get('https://api.afterbuy.de/afterbuy/ShopInterfaceUTF8.aspx');

        /** @var \Guzzle\Http\Message\Response $response */
        $response = $request->send();
        $this->assertTrue($response->isSuccessful());

        $response = $api->getAdapter()->getResponse($response->getBody());

        $this->assertTrue(is_bool($response['success']));
    }

    /**
     * test for the getAfterBuyTimeRequest method
     */
    public function testGetAfterBuyTimeRequest ()
    {
        $connection = new AfterBuyConnection();

        $xmlString = $connection->getAfterBuyTimeRequest();
        $reader = new \XMLReader();
        $reader->XML($xmlString);
        $reader->setParserProperty(\XMLReader::VALIDATE, true);

        $this->assertTrue($reader->isValid());
    }

    /**
     * tets for the getAfterBuySoldItems method
     */
    public function testGetAfterBuySoldItems ()
    {
        $connection = new AfterBuyConnection();

        $xmlString = $connection->getAfterBuySoldItems(array());
        $reader = new \XMLReader();
        $reader->XML($xmlString);
        $reader->setParserProperty(\XMLReader::VALIDATE, true);

        $this->assertTrue($reader->isValid());

    }

    /**
     * Test for the updateAfterBuySoldItems method
     */
    public function testUpdateAfterBuySoldItems ()
    {
        $data = array (
            "orderId" => "100",
            "itemId" => "3",
            "fields" => array(),
        );

        $connection = new AfterBuyConnection();

        $xmlString = $connection->getAfterBuySoldItems($data);
        $reader = new \XMLReader();
        $reader->XML($xmlString);
        $reader->setParserProperty(\XMLReader::VALIDATE, true);

        $this->assertTrue($reader->isValid());
    }

} 