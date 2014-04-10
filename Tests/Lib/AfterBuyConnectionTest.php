<?php


namespace Wk\AfterBuyApi\Tests\Lib;

use GuzzleHttp\Message\Response;
use GuzzleHttp\Client;
use GuzzleHttp\Command\Guzzle\GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description;
use GuzzleHttp\Stream;
use GuzzleHttp\Command\Event\ProcessEvent;
use GuzzleHttp\Event\BeforeEvent;
use Wk\AfterBuyApi\Lib\AfterBuyConnection;

/**
 * Class AfterBuyConnectionTest
 */
class AfterBuyConnectionTest extends \PHPUnit_Framework_TestCase
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

        $tmpclient = new Client();
        $tmpclient->getEmitter()->on('before', function (BeforeEvent $event)  use ($xmlResponse) {
                $event->intercept(new Response(200, array(
                            'Location'     => 'afterbuy.de',
                            'Content-Type' => 'application/json',
                        ), Stream\create($xmlResponse)));
            });

        $json = file_get_contents(__DIR__. "/../../Resources/config/service.json");
        $config = json_decode($json, true);
        $description = new Description($config);

        $client = new GuzzleClient($tmpclient, $description);

        // Create the command and supply the input
        $command = $client->getCommand('getSoldItems', json_decode($jsonRequest, true));

        $command->getEmitter()->on('process', function (ProcessEvent $event, $name) {
            $this->assertEquals($event->getResponse()->getStatusCode(), 200);
            $this->assertEquals($event->getResponse()->getHeader('Content-Type'),'application/json');
            $result = json_decode(json_encode($event->getResponse()->xml()),true);
            $this->assertArrayHasKey("CallStatus", $result);
            $this->assertEquals("Success", $result['CallStatus']);
        });

        $client->execute($command);
    }

    /**
     * Test for the getAfterBuyTimeRequest method
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
     * Test for the getAfterBuySoldItems method
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
