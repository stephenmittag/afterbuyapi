<?php

namespace Wk\AfterbuyApi\Tests\Models\XmlApi\Request;

use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Wk\AfterbuyApi\Models\XmlApi\Response\UpdateSoldItemsResponse;
use \DateTime;

/**
 * Class GetSoldItemsResponseTest
 */
class GetSoldItemsResponseTest extends WebTestCase
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
     * test deserialization of a response on success, assert Order (toplevel)
     */
    public function testDeserializationFromXmlOnSuccessOrder()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('GetSoldItemsResponseOnSuccessOrder.xml');

        $this->assertEquals('Success', $updateSoldItemsResponse->getCallStatus());
        $this->assertEquals('GetSoldItems', $updateSoldItemsResponse->getCallName());
        $this->assertEquals(8, $updateSoldItemsResponse->getVersionId());

        $result = $updateSoldItemsResponse->getResult();

        $this->assertEmpty($result->getErrors());
        $this->assertTrue($result->isHasMoreItems());
        $this->assertEquals(10, $result->getOrdersCount());
        $this->assertEquals(123, $result->getLastOrderId());
        $this->assertEquals(20, $result->getItemsCount());
        $this->assertEquals(1, sizeof($result->getOrders()));

        $order = $result->getOrders()[0];

        $this->assertEquals(1234, $order->getInvoiceNumber());
        $this->assertEquals(12, $order->getOrderId());
        $this->assertEquals('ebay account', $order->getEbayAccount());
        $this->assertEquals('amazon account', $order->getAmazonAccount());
        $this->assertEquals(111, $order->getAnr());
        $this->assertEquals('abc', $order->getAlternativeItemNumber1());
        $this->assertEquals(new DateTime('2003-02-01 01:02:03'), $order->getFeedbackDate());
        $this->assertEquals('user comment', $order->getUserComment());
        $this->assertEquals('additional info', $order->getAdditionalInfo());
        $this->assertEquals('tracking link', $order->getTrackingLink());
        $this->assertEquals('memo', $order->getMemo());
        $this->assertEquals('invoice memo', $order->getInvoiceMemo());
        $this->assertEquals('feedback link', $order->getFeedbackLink());
        $this->assertEquals(new DateTime('2004-03-02 02:03:04'), $order->getOrderDate());
        $this->assertEquals('order id alt', $order->getOrderIdAlt());
    }

    /**
     * test deserialization of a response on success, assert Order/PaymentInfo
     */
    public function testDeserializationFromXmlOnSuccessPaymentInfo()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('GetSoldItemsResponseOnSuccessPaymentInfo.xml');

        $paymentInfo = $updateSoldItemsResponse->getResult()->getOrders()[0]->getPaymentInfo();

        $this->assertEquals('payment id', $paymentInfo->getPaymentId());
        $this->assertEquals('payment method', $paymentInfo->getPaymentMethod());
        $this->assertEquals('payment function', $paymentInfo->getPaymentFunction());
        $this->assertEquals('payment transaction id', $paymentInfo->getPaymentTransactionId());
        $this->assertEquals('payment status', $paymentInfo->getPaymentStatus());
        $this->assertEquals(new DateTime('2005-04-03 03:04:05'), $paymentInfo->getPaymentDate());
        $this->assertEquals(1.2, $paymentInfo->getAlreadyPaid());
        $this->assertEquals(2.5, $paymentInfo->getFullAmount());
        $this->assertEquals('payment instruction', $paymentInfo->getPaymentInstruction());
        $this->assertEquals(new DateTime('2006-05-04 04:05:06'), $paymentInfo->getInvoiceDate());
        $this->assertEquals('eftid', $paymentInfo->getEftid());

        $paymentData = $paymentInfo->getPaymentData();

        $this->assertEquals('bank code', $paymentData->getBankCode());
        $this->assertEquals('account holder', $paymentData->getAccountHolder());
        $this->assertEquals('bank name', $paymentData->getBankName());
        $this->assertEquals('account number', $paymentData->getAccountNumber());
        $this->assertEquals('iban', $paymentData->getIban());
        $this->assertEquals('bic', $paymentData->getBic());
        $this->assertEquals('reference number', $paymentData->getReferenceNumber());
    }

    /**
     * test deserialization of a response on success, assert Order/BuyerInfo
     */
    public function testDeserializationFromXmlOnSuccessBuyerInfo()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('GetSoldItemsResponseOnSuccessBuyerInfo.xml');

        $order = $updateSoldItemsResponse->getResult()->getOrders()[0];

        $billingAddress = $order->getBuyerInfo()->getBillingAddress();

        $this->assertEquals(123, $billingAddress->getAfterbuyUserId());
        $this->assertEquals(1234, $billingAddress->getAfterbuyUserIdAlt());
        $this->assertEquals('user id platform', $billingAddress->getUserIdPlatform());
        $this->assertEquals('firstname', $billingAddress->getFirstName());
        $this->assertEquals('lastname', $billingAddress->getLastName());
        $this->assertEquals('title', $billingAddress->getTitle());
        $this->assertEquals('company', $billingAddress->getCompany());
        $this->assertEquals('street', $billingAddress->getStreet());
        $this->assertEquals('street 2', $billingAddress->getStreet2());
        $this->assertEquals('abc123', $billingAddress->getPostalCode());
        $this->assertEquals('state', $billingAddress->getStateOrProvince());
        $this->assertEquals('city', $billingAddress->getCity());
        $this->assertEquals('phone', $billingAddress->getPhone());
        $this->assertEquals('country', $billingAddress->getCountry());
        $this->assertEquals('de', $billingAddress->getCountryIso());
        $this->assertEquals('fax', $billingAddress->getFax());
        $this->assertEquals('test@test.de', $billingAddress->getMail());
        $this->assertFalse($billingAddress->isMerchant());
        $this->assertEquals('tax id number', $billingAddress->getTaxIdNumber());

        $shippingAddress = $order->getBuyerInfo()->getShippingAddress();

        $this->assertEquals('firstname2', $shippingAddress->getFirstName());
        $this->assertEquals('lastname2', $shippingAddress->getLastName());
        $this->assertEquals('company2', $shippingAddress->getCompany());
        $this->assertEquals('street2', $shippingAddress->getStreet());
        $this->assertEquals('street 22', $shippingAddress->getStreet2());
        $this->assertEquals('abc1232', $shippingAddress->getPostalCode());
        $this->assertEquals('state2', $shippingAddress->getStateOrProvince());
        $this->assertEquals('city2', $shippingAddress->getCity());
        $this->assertEquals('phone2', $shippingAddress->getPhone());
        $this->assertEquals('country2', $shippingAddress->getCountry());
        $this->assertEquals('es', $shippingAddress->getCountryIso());
    }

    /**
     * test deserialization of a response on success, assert Order/ShippingInfo
     */
    public function testDeserializationFromXmlOnSuccessShippingInfo()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('GetSoldItemsResponseOnSuccessShippingInfo.xml');

        $shippingInfo = $updateSoldItemsResponse->getResult()->getOrders()[0]->getShippingInfo();

        $this->assertEquals('shipping method', $shippingInfo->getShippingMethod());
        $this->assertEquals(0.9, $shippingInfo->getShippingCost());
        $this->assertEquals(1.2, $shippingInfo->getShippingAdditionalCost());
        $this->assertEquals(2.1, $shippingInfo->getShippingTotalCost());
        $this->assertEquals(0.19, $shippingInfo->getShippingTaxRate());
        $this->assertEquals(new DateTime('2003-02-01 01:02:03'), $shippingInfo->getDeliveryDate());
    }

    /**
     * test deserialization of a response on error
     */
    public function testDeserializationFromXmlOnError()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('GetSoldItemsResponseOnError.xml');

        $this->assertEquals('Error', $updateSoldItemsResponse->getCallStatus());
        $this->assertEquals('GetSoldItems', $updateSoldItemsResponse->getCallName());
        $this->assertEquals(8, $updateSoldItemsResponse->getVersionId());

        $errorList = $updateSoldItemsResponse->getResult()->getErrors();

        $this->assertEquals(1, sizeof($errorList));
        $this->assertEquals(11, $errorList[0]->getErrorCode());
        $this->assertEquals('something failed', $errorList[0]->getErrorDescription());
        $this->assertEquals('something really failed', $errorList[0]->getErrorLongDescription());
    }

    /**
     * @param string $fileName
     *
     * @return UpdateSoldItemsResponse
     */
    private function deserializeResponse($fileName) {
        $responseBody = file_get_contents(__DIR__ . '/../../Data/Response/' . $fileName);

        return $this->serializer->deserialize($responseBody, UpdateSoldItemsResponse::class, 'xml');
    }
}