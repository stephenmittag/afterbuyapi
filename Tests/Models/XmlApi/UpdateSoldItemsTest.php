<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi;

use JMS\Serializer\Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AfterbuyGlobal;
use Wk\AfterbuyApi\Models\XmlApi\BuyerInfo;
use Wk\AfterbuyApi\Models\XmlApi\Order;
use Wk\AfterbuyApi\Models\XmlApi\PaymentInfo;
use Wk\AfterbuyApi\Models\XmlApi\ShippingAddress;
use Wk\AfterbuyApi\Models\XmlApi\ShippingInfo;
use Wk\AfterbuyApi\Models\XmlApi\UpdateSoldItems;
use Wk\AfterbuyApi\Models\XmlApi\VorgangsInfo;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \DateTime;

/**
 * Class UpdateSoldItemsTest
 */
class UpdateSoldItemsTest extends WebTestCase
{
    /**
     * @var Serializer
     */
    private $serializer;

    /**
     * set up client
     */
    public function setUp()
    {
        $client = static::createClient();
        $this->serializer = $client->getContainer()->get('jms_serializer');
    }

    /**
     * @return array
     */
    public function provideSerializationAndDeserialization()
    {
        return array(
            array('xml', $this->getUpdateSoldItems1(), 'UpdateSoldItems1.xml'),
            array('json', $this->getUpdateSoldItems1(), 'UpdateSoldItems1.json'),
            array('xml', $this->getUpdateSoldItems2(), 'UpdateSoldItems2.xml'),
            array('json', $this->getUpdateSoldItems2(), 'UpdateSoldItems2.json')
        );
    }

    /**
     * @param string          $format
     * @param UpdateSoldItems $updateSoldItems
     * @param string          $deserializedObjectFile
     *
     * @dataProvider provideSerializationAndDeserialization
     */
    public function testSerialization($format, UpdateSoldItems $updateSoldItems, $deserializedObjectFile)
    {
        $serializedUpdateSoldItems = $this->serializer->serialize($updateSoldItems, $format);

        $function = $format == 'xml' ? 'assertXmlStringEqualsXmlFile' : 'assertJsonStringEqualsJsonFile';

        $this->{$function}(__DIR__ . '/../Data/' . $deserializedObjectFile, $serializedUpdateSoldItems);
    }

    /**
     * @param string          $format
     * @param UpdateSoldItems $updateSoldItems
     * @param string          $deserializedObjectFile
     *
     * @dataProvider provideSerializationAndDeserialization
     */
    public function testDeserialization($format, UpdateSoldItems $updateSoldItems, $deserializedObjectFile)
    {
        $serializedUpdateSoldItems = file_get_contents(__DIR__ . '/../Data/' . $deserializedObjectFile);
        $deserializedUpdateSoldItems = $this->serializer->deserialize($serializedUpdateSoldItems, UpdateSoldItems::class, $format);

        $this->assertEquals($updateSoldItems, $deserializedUpdateSoldItems);
    }

    /**
     * @return UpdateSoldItems
     */
    private function getUpdateSoldItems1()
    {
        $shippingAddress = (new ShippingAddress())
            ->setUseShippingAddress(true)
            ->setFirstName('firstname')
            ->setLastName('lastname')
            ->setCompany('company')
            ->setStreet('street 1')
            ->setPostalCode('ab123')
            ->setCity('city')
            ->setCountry('de');

        $buyerInfo = (new BuyerInfo())
            ->setShippingAddress($shippingAddress);

        $paymentInfo = (new PaymentInfo())
            ->setPaymentMethod('paypal')
            ->setPaymentDate(new DateTime('2010-09-08 08:09:10'))
            ->setAlreadyPaid(10.20)
            ->setPaymentAdditionalCost(4.50)
            ->setSendPaymentMail(true);

        $shippingInfo = (new ShippingInfo())
            ->setShippingMethod('DHL')
            ->setShippingGroup('standard')
            ->setShippingCost(2.90)
            ->setDeliveryDate(new DateTime('2011-10-09 09:10:11'))
            ->setEBayShippingCost(0.90)
            ->setSendShippingMail(false);

        $vorgangsInfo = (new VorgangsInfo())
            ->setVorgangsInfo1('vorgangsinfo1')
            ->setVorgangsInfo2('vorgangsinfo2')
            ->setVorgangsInfo3('vorgangsinfo3');

        $afterbuyGlobal = (new AfterbuyGlobal())
            ->setPartnerId(12)
            ->setPartnerPassword('partner password')
            ->setUserId('user id')
            ->setUserPassword('user password')
            ->setCallName('call name')
            ->setDetailLevel(0)
            ->setErrorLanguage('de');

        $order = (new Order())
            ->setOrderId(34)
            ->setItemId(56)
            ->setUserDefinedFlag(78)
            ->setAdditionalInfo('additional info')
            ->setMailDate(new DateTime('2003-02-01 01:02:03'))
            ->setReminderMailDate(new DateTime('2004-03-02 02:03:04'))
            ->setUserComment('user comment')
            ->setOrderMemo('order memo')
            ->setInvoiceMemo('invoice memo')
            ->setInvoiceNumber(90)
            ->setOrderExported(true)
            ->setInvoiceDate(new DateTime('2005-04-03 03:04:05'))
            ->setHideOrder(false)
            ->setReminder1Date(new DateTime('2006-05-04 04:05:06'))
            ->setReminder2Date(new DateTime('2007-06-05 05:06:07'))
            ->setFeedbackDate(new DateTime('2008-07-06 06:07:08'))
            ->setXmlDate(new DateTime('2009-08-07 07:08:09'))
            ->setBuyerInfo($buyerInfo)
            ->setPaymentInfo($paymentInfo)
            ->setShippingInfo($shippingInfo)
            ->setVorgangsInfo($vorgangsInfo);

        $updateSoldItems = (new UpdateSoldItems())
            ->setAfterbuyGlobal($afterbuyGlobal)
            ->setOrders(array($order));

        return $updateSoldItems;
    }

    /**
     * @return UpdateSoldItems
     */
    private function getUpdateSoldItems2()
    {
        $afterbuyGlobal = (new AfterbuyGlobal())
            ->setPartnerId(12)
            ->setPartnerPassword('partner password')
            ->setUserId('user id')
            ->setUserPassword('user password')
            ->setCallName('call name')
            ->setDetailLevel(1)
            ->setErrorLanguage('de');

        $order1 = (new Order())
            ->setOrderId(12)
            ->setUserDefinedFlag(34)
            ->setInvoiceMemo('');

        $order2 = (new Order())
            ->setOrderId(56)
            ->setUserDefinedFlag(78);

        $updateSoldItems = (new UpdateSoldItems())
            ->setAfterbuyGlobal($afterbuyGlobal)
            ->setOrders(array($order1, $order2));

        return $updateSoldItems;
    }
}