<?php

use Wk\AfterbuyApi\Models\XmlApi;


class SoldItemsListTest  extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->soldItemsList = new XmlApi\SoldItemsList();
    }

    public function testSetDefaultFilter()
    {
        $result = $this->soldItemsList->setDefaultFilter('kghggh');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SolditemsList',$result);
    }

    public function testGetDefaultFilter()
    {
        $this->soldItemsList->setDefaultFilter('123456789');
        $this->assertSame('123456789', $this->soldItemsList->getDefaultFilter());

        $this->soldItemsList->setDefaultFilter('66546546456');
        $this->assertTrue(is_string($this->soldItemsList->getDefaultFilter()));
    }

    public function testSetUserDefinedFlag()
    {
        $result = $this->soldItemsList->setUserDefinedFlag(99999);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SolditemsList',$result);
    }


    public function testGetUserDefinedFlag()
    {
        $this->soldItemsList->setUserDefinedFlag(123456789);
        $this->assertSame(123456789, $this->soldItemsList->getUserDefinedFlag());

        $this->soldItemsList->setUserDefinedFlag('66546546456');
        $this->assertTrue(is_int($this->soldItemsList->getUserDefinedFlag()));
    }


    public function testGetData()
    {
        $credentials = array('partner_id' => '1',
                             'partner_pass'=> '1',
                             'user_id' => '1',
                             'user_pass' => '1');

        $result = $this->soldItemsList->setUserDefinedFlag(17733);


        $object = simplexml_load_string($result->getData($credentials));

        $this->assertObjectHasAttribute('AfterbuyGlobal', $object);
        $this->assertObjectHasAttribute('PartnerID', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('PartnerPassword', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('UserID', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('UserPassword', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('CallName', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('DetailLevel', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('ErrorLanguage', $object->AfterbuyGlobal);
        $this->assertObjectHasAttribute('RequestAllItems', $object);
        $this->assertObjectHasAttribute('DataFilter', $object);
        $this->assertObjectHasAttribute('Filter', $object->DataFilter);
        $this->assertObjectHasAttribute('FilterName', $object->DataFilter->Filter);
        $this->assertObjectHasAttribute('FilterValues', $object->DataFilter->Filter);
        $this->assertObjectHasAttribute('FilterValue', $object->DataFilter->Filter->FilterValues);
    }
}