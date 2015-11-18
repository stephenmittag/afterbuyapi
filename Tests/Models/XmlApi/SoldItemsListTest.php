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
     * @return array
     */
    public function dataSetterAndGetter()
    {
        return array(
            array('setDefaultFilter', null, 'getDefaultFilter', ''),
            array('setDefaultFilter', 123456789, 'getDefaultFilter', '123456789'),
            array('setDefaultFilter', '123456789', 'getDefaultFilter', '123456789'),
            array('setDefaultFilter', 'abcdef', 'getDefaultFilter', 'abcdef'),
            array('setUserDefinedFlag', null, 'getUserDefinedFlag', 0),
            array('setUserDefinedFlag', 123456789, 'getUserDefinedFlag', 123456789),
            array('setUserDefinedFlag', '123456789', 'getUserDefinedFlag', 123456789),
            array('setUserDefinedFlag', 'abcdef', 'getUserDefinedFlag', 0),
            array('setMustHaveFeedbackDate', null, 'getMustHaveFeedbackDate', false),
            array('setMustHaveFeedbackDate', false, 'getMustHaveFeedbackDate', false),
            array('setMustHaveFeedbackDate', true, 'getMustHaveFeedbackDate', true),
            array('setMustHaveFeedbackDate', 123, 'getMustHaveFeedbackDate', true)
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
    public function testSetterAndGetter($setter, $setterValue, $getter, $expectedGetterValue)
    {
        $soldItemsList = $this->soldItemsList->{$setter}($setterValue);

        $this->assertInstanceOf('Wk\AfterbuyApi\Models\XmlApi\SoldItemsList', $soldItemsList);

        $this->assertSame($expectedGetterValue, $this->soldItemsList->{$getter}());
    }

    /**
     * test if getData returns the correct SimpleXMLElement object and with correct attributes
     */
    public function testGetData()
    {
        $credentials = array(
            'partner_id' => '1',
            'partner_pass' => '1',
            'user_id' => '1',
            'user_pass' => '1'
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