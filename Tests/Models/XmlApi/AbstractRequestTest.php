<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi;

use JMS\Serializer\Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractRequest;
use Wk\AfterbuyApi\Models\XmlApi\AfterbuyGlobal;
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
            array($this->createExemplaryUpdateSoldItemsRequest1(), 'UpdateSoldItems1.xml'),
            array($this->createExemplaryUpdateSoldItemsRequest2(), 'UpdateSoldItems2.xml'),

            array($this->createExemplaryGetSoldItemsRequest1(), 'GetSoldItems1.xml'),
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
     * @return UpdateSoldItemsRequest
     */
    private function createExemplaryUpdateSoldItemsRequest1()
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

        $updateSoldItems = (new UpdateSoldItemsRequest())
            ->setAfterbuyGlobal($this->getAfterbuyGlobal())
            ->setOrders(array($order));

        return $updateSoldItems;
    }

    /**
     * @return UpdateSoldItemsRequest
     */
    private function createExemplaryUpdateSoldItemsRequest2()
    {
        $order1 = (new Order())
            ->setOrderId(12)
            ->setUserDefinedFlag(34)
            ->setInvoiceMemo('');

        $order2 = (new Order())
            ->setOrderId(56)
            ->setUserDefinedFlag(78);

        $updateSoldItems = (new UpdateSoldItemsRequest())
            ->setAfterbuyGlobal($this->getAfterbuyGlobal())
            ->setOrders(array($order1, $order2));

        return $updateSoldItems;
    }

    /**
     * @return GetSoldItemsRequest
     */
    private function createExemplaryGetSoldItemsRequest1()
    {
        $orderIdFilter1 = (new OrderIdFilter());
        $rangeIdFilter1 = (new RangeIdFilter())
            ->setValueFrom(2)
            ->setValueTo(4);
        $rangeIdFilter2 = (new RangeIdFilter())
            ->setValueFrom(6);
        $dateFilter1 = (new DateFilter())
            ->setDateFrom(new DateTime('2003-02-01 01:02:03'))
            ->setDateTo(new DateTime('2004-03-02 02:03:04'));
        $dateFilter2 = (new DateFilter())
            ->setDateFrom(new DateTime('2005-04-03 03:04:05'));
        $defaultFilter1 = (new DefaultFilter());
        $platformFilter1 = (new PlatformFilter());
        $userIdFilter1 = (new UserIdFilter());
        $userDefinedFlagFilter1 = (new UserDefinedFlagFilter());
        $userEmailFilter = (new UserEmailFilter());
        $shopIdFilter = (new ShopIdFilter());

        $getSoldItems = (new GetSoldItemsRequest())
            ->setAfterbuyGlobal($this->getAfterbuyGlobal())
            ->setRequestAllItems(true)
            ->setMaxSoldItems(10)
            ->setOrderDirection(1)
            ->addFilter($orderIdFilter1)
            ->addFilter($rangeIdFilter1)
            ->addFilter($rangeIdFilter2)
            ->addFilter($dateFilter1)
            ->addFilter($dateFilter2)
            ->addFilter($defaultFilter1)
            ->addFilter($platformFilter1)
            ->addFilter($userIdFilter1)
            ->addFilter($userDefinedFlagFilter1)
            ->addFilter($userEmailFilter)
            ->addFilter($shopIdFilter);

        return $getSoldItems;
    }

    /**
     * @return AfterbuyGlobal
     */
    private function getAfterbuyGlobal()
    {
        $afterbuyGlobal = (new AfterbuyGlobal())
            ->setPartnerId(12)
            ->setPartnerPassword('partner password')
            ->setUserId('user id')
            ->setUserPassword('user password')
            ->setCallName('call name')
            ->setDetailLevel(0)
            ->setErrorLanguage('de');

        return $afterbuyGlobal;
    }
}