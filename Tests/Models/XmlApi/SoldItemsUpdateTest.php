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
            array('setInvoiceMemo', 'abcdef', 'getInvoiceMemo', 'abcdef')
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
        $soldItemsList = $this->soldItemsUpdate->{$setter}($setterValue);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate', $soldItemsList);

        $this->assertSame($expectedGetterValue, $this->soldItemsUpdate->{$getter}());
    }


    /**
     * test if setter returns an instance of SoldItemsUpdate
     */
    public function testSetInvoiceMemo()
    {
        $result = $this->soldItemsUpdate->setInvoiceMemo('test');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate', $result);
    }

    /**
     * test getter
     */
    public function testGetInvoiceMemo()
    {
        $this->soldItemsUpdate->setInvoiceMemo('test');

        $this->assertTrue(is_string($this->soldItemsUpdate->getInvoiceMemo()));
        $this->assertSame('test', $this->soldItemsUpdate->getInvoiceMemo());
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

        $result = $this->soldItemsUpdate->setOrderId(65656)
            ->setOperationFieldOne('gfgfgf')
            ->setInvoiceMemo('gfgfgf')
            ->setUserDefinedFlag(123);

        $object = simplexml_load_string($result->getData($credentials));

        $this->assertObjectHasAttribute('AfterbuyGlobal', $object);
        $this->assertObjectHasAttribute('PartnerID', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('PartnerPassword', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('UserID', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('UserPassword', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('CallName', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('DetailLevel', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('ErrorLanguage', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('Orders', $object);
        $this->assertObjectHasAttribute('Order', $object->Orders);
        $this->assertObjectHasAttribute('OrderID', $object->Orders->Order);
        $this->assertObjectHasAttribute('InvoiceMemo', $object->Orders->Order);
        $this->assertObjectHasAttribute('UserDefinedFlag', $object->Orders->Order);
    }
}