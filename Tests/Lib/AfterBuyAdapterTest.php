<?php

namespace Wk\AfterBuyApi\Tests\Lib;

use Wk\AfterBuyApi\Lib\AfterBuyAdapter;
use Wk\AfterBuyApi\Lib\AfterBuyConnection;

/**
 * Class AfterBuyAdapterTest
 */
class AfterBuyAdapterTest extends \PHPUnit_Framework_TestCase 
{

    /**
     * Test for the getResponse method
     */
    public function testGetResponse ()
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

        $adapter = new AfterBuyAdapter();
        $result = $adapter->getResponse($xmlString);

        $this->assertCount(2, $result);
        $this->assertArrayHasKey('success', $result);
        $this->assertArrayHasKey('message', $result);
        $this->assertTrue(is_bool($result['success']));
        $this->assertTrue(is_string($result['message']));
    }

    /**
     * Test for the buildAfterBuySoldItemsXmlString method
     */
    public function testBuildAfterBuySoldItemsXmlString ()
    {

        $data = array (
            "item" => "Test Item",
            "user" => "John Doe",
            "maxSoldItems" => false,
        );

        $adapter = new AfterBuyAdapter();

        $xmlString = $adapter->buildAfterBuySoldItemsXmlString($data);
        $xml = simplexml_load_string($xmlString);

        $this->assertTrue($xml instanceof \SimpleXMLElement);
        $this->assertXmlStringEqualsXmlString("<?xml version='1.0'?><MaxSoldItems>0</MaxSoldItems>", (string) $xml->asXml());

    }

    /**
     * Test for the buildUpdateAfterBuySoldItemsXmlString method
     */
    public function testBuildUpdateAfterBuySoldItemsXmlString ()
    {

        $data = array (
            "orderId" => "100",
            "itemId" => "3",
            "fields" => array(),
        );

        $adapter = new AfterBuyAdapter();

        $xmlString = $adapter->buildUpdateAfterBuySoldItemsXmlString($data);
        $xml = simplexml_load_string($xmlString);

        $this->assertTrue($xml instanceof \SimpleXMLElement);

        $expectedXml = "<?xml version='1.0'?><Orders><Order><OrderID>100</OrderID><ItemID>3</ItemID></Order></Orders>";

        $this->assertXmlStringEqualsXmlString($expectedXml, (string) $xml->asXml());

    }

} 
