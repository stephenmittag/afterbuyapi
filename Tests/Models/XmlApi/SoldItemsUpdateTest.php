<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi;

use Wk\AfterbuyApi\Models\XmlApi;
use Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate;

/**
 * Class SoldItemsUpdateTest
 */
class SoldItemsUpdateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SoldItemsUpdate
     */
    private $soldItemsUpdate;

    /**
     * initialize global variable
     */
    public function setUp()
    {
        $this->soldItemsUpdate = new XmlApi\SoldItemsUpdate();
    }

    /**
     * @return array
     */
    public function dataSetterAndGetter() {
        $dateTime = \DateTime::createFromFormat('Y-m-d H:i:s', '2015-10-01 12:01:02');

        return array(
            array('setOrderId', null, 'getOrderId', 0),
            array('setOrderId', 123456789, 'getOrderId', 123456789),
            array('setOrderId', '123456789', 'getOrderId', 123456789),
            array('setOrderId', 'abcdef', 'getOrderId', 0),
            array('setUserDefinedFlag', null, 'getUserDefinedFlag', 0),
            array('setUserDefinedFlag', 123456789, 'getUserDefinedFlag', 123456789),
            array('setUserDefinedFlag', '123456789', 'getUserDefinedFlag', 123456789),
            array('setUserDefinedFlag', 'abcdef', 'getUserDefinedFlag', 0),
            array('setOperationFieldOne', null, 'getOperationFieldOne', ''),
            array('setOperationFieldOne', 1233456789, 'getOperationFieldOne', '1233456789'),
            array('setOperationFieldOne', '1233456789', 'getOperationFieldOne', '1233456789'),
            array('setOperationFieldOne', 'abcdef', 'getOperationFieldOne', 'abcdef'),
            array('setInvoiceMemo', null, 'getInvoiceMemo', ''),
            array('setInvoiceMemo', 1233456789, 'getInvoiceMemo', '1233456789'),
            array('setInvoiceMemo', '1233456789', 'getInvoiceMemo', '1233456789'),
            array('setInvoiceMemo', 'abcdef', 'getInvoiceMemo', 'abcdef'),
            array('setInvoiceDate', $dateTime, 'getInvoiceDate', $dateTime),
            array('setInvoiceDate', null, 'getInvoiceDate', null)
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
    public function testSetterAndGetter($setter, $setterValue, $getter, $expectedGetterValue) {
        $soldItemsUpdate = $this->soldItemsUpdate->{$setter}($setterValue);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate', $soldItemsUpdate);

        $this->assertSame($expectedGetterValue, $this->soldItemsUpdate->{$getter}());
    }

    /**
     * test if getData returns the correct SimpleXmlElement object with correct attributes
     */
    public function testGetData()
    {
        $credentials = array(
            'partner_id' => '1',
            'partner_pass' => '1',
            'user_id' => '1',
            'user_pass' => '1'
        );

        $result = $this->soldItemsUpdate
            ->setOrderId(65656)
            ->setInvoiceMemo('def')
            ->setUserDefinedFlag(123)
            ->setInvoiceDate(\DateTime::createFromFormat('Y-m-d H:i:s', '2015-05-25 08:09:10'));

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../Data/UpdateSoldItems.xml', $result->getData($credentials));
    }
}