<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi;

use JMS\Serializer\Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractRequest;
use Wk\AfterbuyApi\Models\XmlApi\BuyerInfo;
use Wk\AfterbuyApi\Models\XmlApi\Filter\DateFilter;
use Wk\AfterbuyApi\Models\XmlApi\Filter\DefaultFilter;
use Wk\AfterbuyApi\Models\XmlApi\Filter\ShopIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\Filter\UserDefinedFlagFilter;
use Wk\AfterbuyApi\Models\XmlApi\Filter\UserEmailFilter;
use Wk\AfterbuyApi\Models\XmlApi\Filter\UserIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\GetSoldItemsRequest;
use Wk\AfterbuyApi\Models\XmlApi\Order;
use Wk\AfterbuyApi\Models\XmlApi\Filter\OrderIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\PaymentInfo;
use Wk\AfterbuyApi\Models\XmlApi\Filter\PlatformFilter;
use Wk\AfterbuyApi\Models\XmlApi\Filter\RangeIdFilter;
use Wk\AfterbuyApi\Models\XmlApi\ShippingAddress;
use Wk\AfterbuyApi\Models\XmlApi\ShippingInfo;
use Wk\AfterbuyApi\Models\XmlApi\UpdateSoldItemsRequest;
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
            array($this->createExemplaryGetSoldItemsRequest1(), 'GetSoldItems1.xml'),
            array($this->createExemplaryGetSoldItemsRequest2(), 'GetSoldItems2.xml'),

            array($this->createExemplaryUpdateSoldItemsRequest1(), 'UpdateSoldItems1.xml'),
            array($this->createExemplaryUpdateSoldItemsRequest2(), 'UpdateSoldItems2.xml')
        );
    }

    /**
     * @param AbstractRequest $request
     * @param string          $deserializedObjectFile
     *
     * @dataProvider provideSerializationAndDeserialization
     */
    public function testSerializationToXml(AbstractRequest $request, $deserializedObjectFile)
    {
        $serializedUpdateSoldItemsRequest = $this->serializer->serialize($request, 'xml');

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../Data/' . $deserializedObjectFile, $serializedUpdateSoldItemsRequest);
    }

    /**
     * @return GetSoldItemsRequest
     */
    private function createExemplaryGetSoldItemsRequest1()
    {
        $rangeIdFilter1 = (new RangeIdFilter())
            ->setValueFrom(2)
            ->setValueTo(4);
        $rangeIdFilter2 = (new RangeIdFilter())
            ->setValueFrom(6);
        $dateFilter1 = (new DateFilter(DateFilter::FILTER_AUCTION_END_DATE))
            ->setDateFrom(new DateTime('2003-02-01 01:02:03'))
            ->setDateTo(new DateTime('2004-03-02 02:03:04'));
        $dateFilter2 = (new DateFilter(DateFilter::FILTER_FEEDBACK_DATE))
            ->setDateFrom(new DateTime('2005-04-03 03:04:05'));

        $getSoldItems = (new GetSoldItemsRequest('user id', 'user password', 12, 'partner password', 'de'))
            ->setRequestAllItems(true)
            ->setMaxSoldItems(10)
            ->setOrderDirectionAscending()
            ->addFilter(new OrderIdFilter(123))
            ->addFilter($rangeIdFilter1)
            ->addFilter($rangeIdFilter2)
            ->addFilter($dateFilter1)
            ->addFilter($dateFilter2);

        return $getSoldItems;
    }

    /**
     * @return GetSoldItemsRequest
     */
    private function createExemplaryGetSoldItemsRequest2()
    {
        $getSoldItems = (new GetSoldItemsRequest('user id2', 'user password2', 123, 'partner password2', 'en'))
            ->setDetailLevel(GetSoldItemsRequest::DETAIL_LEVEL_PAYMENT_DATA)
            ->setRequestAllItems(true)
            ->setMaxSoldItems(10)
            ->setOrderDirectionDescending()
            ->addFilter(new DefaultFilter(DefaultFilter::FILTER_COMPLETED_AUCTIONS))
            ->addFilter(new PlatformFilter('ebay'))
            ->addFilter(new PlatformFilter('ebay', true))
            ->addFilter(new UserIdFilter(123))
            ->addFilter(new UserDefinedFlagFilter(456))
            ->addFilter(new UserEmailFilter('test@test.de'))
            ->addFilter(new ShopIdFilter(789));

        return $getSoldItems;
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