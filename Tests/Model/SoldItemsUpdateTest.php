<?php

use Wk\AfterbuyApi\Models\XmlApi;



class SoldItemsUpdateTest  extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->soldItemsUpdate = new XmlApi\SoldItemsUpdate();
    }


    public function testSetOrderId()
    {
        $result = $this->soldItemsUpdate->setOrderId('27878768');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate',$result);
    }


    public function testGetOrderId()
    {
        $this->soldItemsUpdate->setOrderId('90966656');
        $this->assertSame(90966656, $this->soldItemsUpdate->getOrderId());

        $this->soldItemsUpdate->setOrderId('h9hghtzgf');
        $this->assertSame(0, $this->soldItemsUpdate->getOrderId());
    }


    public function testSetOperationFieldOne()
    {
        $result = $this->soldItemsUpdate->setOperationFieldOne('test');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsUpdate',$result);
    }


    public function testGetOperationFieldOne()
    {
        $this->soldItemsUpdate->setOperationFieldOne('test');

        $this->assertTrue(is_string($this->soldItemsUpdate->getOperationFieldOne()));
        $this->assertSame('test', $this->soldItemsUpdate->getOperationFieldOne());
    }


    public function testGetData()
    {
        $credentials = array('partner_id' => '1',
                             'partner_pass'=> '1',
                             'user_id' => '1',
                             'user_pass' => '1');

        $result = $this->soldItemsUpdate->setOrderId(65656)
                                        ->setOperationFieldOne('gfgfgf');

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
        $this->assertObjectHasAttribute('VorgangsInfo', $object->Orders->Order);
        $this->assertObjectHasAttribute('VorgangsInfo1', $object->Orders->Order->VorgangsInfo);
    }

}