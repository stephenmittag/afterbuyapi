<?php

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
     * test if setter returns an instance of SoldItemsUpdate
     */
    public function testSetOrderId()
    {
        $result = $this->soldItemsUpdate->setOrderId('27878768');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate', $result);
    }

    /**
     * test if getter return correct orderID
     */
    public function testGetOrderId()
    {
        $this->soldItemsUpdate->setOrderId('90966656');
        $this->assertSame(90966656, $this->soldItemsUpdate->getOrderId());

        $this->soldItemsUpdate->setOrderId('h9hghtzgf');
        $this->assertSame(0, $this->soldItemsUpdate->getOrderId());
    }

    /**
     * test if setter returns an instance of SoldItemsUpdate
     */
    public function testSetOperationFieldOne()
    {
        $result = $this->soldItemsUpdate->setOperationFieldOne('test');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate', $result);
    }

    /**
     * test if getter returns correct value
     */
    public function testGetOperationFieldOne()
    {
        $this->soldItemsUpdate->setOperationFieldOne('test');

        $this->assertTrue(is_string($this->soldItemsUpdate->getOperationFieldOne()));
        $this->assertSame('test', $this->soldItemsUpdate->getOperationFieldOne());
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
            ->setInvoiceMemo('gfgfgf');

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
    }
}