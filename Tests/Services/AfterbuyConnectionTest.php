<?php


namespace Wk\AfterbuyApi\Tests\Services;

use GuzzleHttp\Stream;
use Wk\AfterbuyApi\Services\AfterbuyConnection;

/**
 * Class AfterbuyConnectionTest
 */
class AfterbuyConnectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test for the generateAfterbuyTimeRequest method
     */
    public function testGenerateAfterbuyTimeRequest()
    {
        $connection = new AfterbuyConnection();

        $xmlString = $connection->generateAfterbuyTimeRequest();
        $reader = new \XMLReader();
        $reader->XML($xmlString);
        $reader->setParserProperty(\XMLReader::VALIDATE, true);

        $this->assertTrue($reader->isValid());
    }

    /**
     * Test for the generateAfterbuySoldItemsRequest method
     */
    public function testGenerateAfterbuySoldItemsRequest()
    {
        $connection = new AfterbuyConnection();

        $xmlString = $connection->generateAfterbuySoldItemsRequest(array());
        $reader = new \XMLReader();
        $reader->XML($xmlString);
        $reader->setParserProperty(\XMLReader::VALIDATE, true);

        $this->assertTrue($reader->isValid());

    }

    /**
     * Test for the generateAfterbuyUpdateSoldItemsRequest method
     */
    public function testGenerateAfterbuyUpdateSoldItemsRequest()
    {
        $data = array(
            "orderId" => "100",
            "itemId" => "3",
            "fields" => array(),
        );

        $connection = new AfterbuyConnection();

        $xmlString = $connection->generateAfterbuyUpdateSoldItemsRequest($data);
        $reader = new \XMLReader();
        $reader->XML($xmlString);
        $reader->setParserProperty(\XMLReader::VALIDATE, true);

        $this->assertTrue($reader->isValid());
    }
}
