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
