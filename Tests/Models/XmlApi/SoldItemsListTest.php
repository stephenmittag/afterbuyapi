<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi;

use Wk\AfterbuyApi\Models\XmlApi\SoldItemsList;

/**
 * Class SoldItemsListTest
 */
class SoldItemsListTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SoldItemsList
     */
    private $soldItemsList;

    /**
     * initialize global variable
     */
    public function setUp()
    {
        $this->soldItemsList = new SoldItemsList();
    }

    /**
     * test if setter returns an instance of SolditemsList
     */
    public function testSetDefaultFilter()
    {
        $result = $this->soldItemsList->setDefaultFilter('kghggh');

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SolditemsList', $result);
    }

    /**
     * test if getter returns the correct default filter
     */
    public function testGetDefaultFilter()
    {
        $this->soldItemsList->setDefaultFilter('123456789');
        $this->assertSame('123456789', $this->soldItemsList->getDefaultFilter());

        $this->soldItemsList->setDefaultFilter('66546546456');
        $this->assertTrue(is_string($this->soldItemsList->getDefaultFilter()));
    }

    /**
     * test if setter returns an instance of SolditemsList
     */
    public function testSetUserDefinedFlag()
    {
        $result = $this->soldItemsList->setUserDefinedFlag(99999);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SolditemsList', $result);
    }

    /**
     * test if getter returns correct user defined flag
     */
    public function testGetUserDefinedFlag()
    {
        $this->soldItemsList->setUserDefinedFlag(123456789);
        $this->assertSame(123456789, $this->soldItemsList->getUserDefinedFlag());

        $this->soldItemsList->setUserDefinedFlag('66546546456');
        $this->assertTrue(is_int($this->soldItemsList->getUserDefinedFlag()));
    }

    /**
     * test if setter returns an instance of SolditemsList
     */
    public function testSetMustHaveFeedbackDate() {
        $result = $this->soldItemsList->setMustHaveFeedbackDate(true);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SolditemsList', $result);
    }

    /**
     * test if getter returns correct feedback date setting
     */
    public function testGetMustHaveFeedbackDate()
    {
        $this->soldItemsList->setMustHaveFeedbackDate(true);
        $this->assertSame(true, $this->soldItemsList->getMustHaveFeedbackDate());

        $this->soldItemsList->setMustHaveFeedbackDate(false);
        $this->assertSame(false, $this->soldItemsList->getMustHaveFeedbackDate());
    }

    /**
     * test if getData returns the correct SimpleXMLElement object and with correct attributes
     */
    public function testGetData()
    {
        $credentials = array(
            'partner_id'   => '1',
            'partner_pass' => '1',
            'user_id'      => '1',
            'user_pass'    => '1'
        );

        $result = $this->soldItemsList
            ->setUserDefinedFlag(17733)
            ->setMustHaveFeedbackDate(true);

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
        $this->assertObjectHasAttribute('DateFrom', $object->DataFilter->Filter->FilterValues);
    }
}