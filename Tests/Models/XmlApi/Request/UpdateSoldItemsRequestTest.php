<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi\Request;

use JMS\Serializer\Serializer;
use Wk\AfterbuyApi\Models\XmlApi\Request\AbstractRequest;
use Wk\AfterbuyApi\Models\XmlApi\Request\BuyerInfo;
use Wk\AfterbuyApi\Models\XmlApi\Request\GetSoldItemsRequest;
use Wk\AfterbuyApi\Models\XmlApi\Request\Order;
use Wk\AfterbuyApi\Models\XmlApi\Request\PaymentInfo;
use Wk\AfterbuyApi\Models\XmlApi\Request\ShippingAddress;
use Wk\AfterbuyApi\Models\XmlApi\Request\ShippingInfo;
use Wk\AfterbuyApi\Models\XmlApi\Request\UpdateSoldItemsRequest;
use Wk\AfterbuyApi\Models\XmlApi\Request\VorgangsInfo;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \DateTime;

/**
 * Class UpdateSoldItemsRequestTest
 */
class UpdateSoldItemsRequestTest extends WebTestCase
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
    public function provideSerializationToXml()
    {
        return array(
            array($this->createExemplaryUpdateSoldItemsRequest1(), 'UpdateSoldItemsRequest1.xml'),
            array($this->createExemplaryUpdateSoldItemsRequest2(), 'UpdateSoldItemsRequest2.xml')
        );
    }

    /**
     * @param UpdateSoldItemsRequest $updateSoldItemsRequest
     * @param string                 $deserializedObjectFile
     *
     * @dataProvider provideSerializationToXml
     */
    public function testSerializationToXml(UpdateSoldItemsRequest $updateSoldItemsRequest, $deserializedObjectFile)
    {
        $serializedUpdateSoldItemsRequest = $this->serializer->serialize($updateSoldItemsRequest, 'xml');

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../../Data/Request/' . $deserializedObjectFile, $serializedUpdateSoldItemsRequest);
    }

    /**
     * @return UpdateSoldItemsRequest
     */
    private function createExemplaryUpdateSoldItemsRequest1()
    {
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
            ->setXmlDate(new DateTime('2009-08-07 07:08:09'));

        $updateSoldItems = (new UpdateSoldItemsRequest('user id', 'user password', 12, 'partner password', 'de'))
            ->setOrders(array($order));

        return $updateSoldItems;
    }

    /**
     * @return UpdateSoldItemsRequest
     */
    private function createExemplaryUpdateSoldItemsRequest2()
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
            ->setAlreadyPaid(10.2)
            ->setPaymentAdditionalCost(4.5)
            ->setSendPaymentMail(true);

        $shippingInfo = (new ShippingInfo())
            ->setShippingMethod('DHL')
            ->setShippingGroup('standard')
            ->setShippingCost(2.9)
            ->setDeliveryDate(new DateTime('2011-10-09 09:10:11'))
            ->setEBayShippingCost(0.9)
            ->setSendShippingMail(false);

        $vorgangsInfo = (new VorgangsInfo())
            ->setVorgangsInfo1('vorgangsinfo1')
            ->setVorgangsInfo2('vorgangsinfo2')
            ->setVorgangsInfo3('vorgangsinfo3');

        $order1 = (new Order())
            ->setOrderId(12)
            ->setUserDefinedFlag(34)
            ->setInvoiceMemo('')
            ->setBuyerInfo($buyerInfo)
            ->setPaymentInfo($paymentInfo)
            ->setShippingInfo($shippingInfo)
            ->setVorgangsInfo($vorgangsInfo);

        $order2 = (new Order())
            ->setOrderId(56)
            ->setUserDefinedFlag(78);

        $updateSoldItems = (new UpdateSoldItemsRequest('user id2', 'user password2', 123, 'partner password2', 'en'))
            ->setOrders(array($order1, $order2))
            ->setDetailLevel(GetSoldItemsRequest::DETAIL_LEVEL_PAYMENT_DATA);

        return $updateSoldItems;
    }
}