<?php

namespace Wk\AfterbuyApi\Tests\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Serializer;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \DateTime;
use Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\GetSoldItemsResponse;

/**
 * Class ResponseTest
 */
class ResponseTest extends WebTestCase
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
        $getSoldItemsResponse = $this->deserializeResponse('ResponseOnSuccessOrder.xml');

        $this->assertEquals('Success', $getSoldItemsResponse->getCallStatus());
        $this->assertEquals('GetSoldItems', $getSoldItemsResponse->getCallName());
        $this->assertEquals(8, $getSoldItemsResponse->getVersionId());

        $result = $getSoldItemsResponse->getResult();

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
        $getSoldItemsResponse = $this->deserializeResponse('ResponseOnSuccessPaymentInfo.xml');

        $paymentInfo = $getSoldItemsResponse->getResult()->getOrders()[0]->getPaymentInfo();

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
     * test deserialization of a response on success, assert Order/SoldItems
     */
    public function testDeserializationFromXmlOnSuccessSoldItems()
    {
        $getSoldItemsResponse = $this->deserializeResponse('ResponseOnSuccessSoldItems.xml');

        $soldItems = $getSoldItemsResponse->getResult()->getOrders()[0]->getSoldItems();

        $this->assertCount(2, $soldItems);
        $this->assertEquals(123, $soldItems[0]->getItemId());

        $soldItem = $soldItems[1];

        $this->assertTrue($soldItem->isItemDetailsDone());
        $this->assertEquals(123, $soldItem->getItemId());
        $this->assertEquals(1.3, $soldItem->getAnr());
        $this->assertEquals(345, $soldItem->getEbayTransactionId());
        $this->assertEquals('alternative item number 1', $soldItem->getAlternativeItemNumber1());
        $this->assertEquals('alternative item number', $soldItem->getAlternativeItemNumber());
        $this->assertEquals(33, $soldItem->getInternalItemType());
        $this->assertEquals(332, $soldItem->getUserDefinedFlag());
        $this->assertEquals('item title', $soldItem->getItemTitle());
        $this->assertEquals(7, $soldItem->getItemQuantity());
        $this->assertEquals(3.4, $soldItem->getItemPrice());
        $this->assertEquals(new DateTime('2003-02-01 01:02:03'), $soldItem->getItemEndDate());
        $this->assertEquals(0.19, $soldItem->getTaxRate());
        $this->assertEquals(3.2, $soldItem->getItemWeight());
        $this->assertEquals(new DateTime('2004-03-02 02:03:04'), $soldItem->getItemXmlDate());
        $this->assertEquals(new DateTime('2005-04-03 03:04:05'), $soldItem->getItemModDate());
        $this->assertEquals('item platform name', $soldItem->getItemPlatformName());
        $this->assertEquals('item link', $soldItem->getItemLink());
        $this->assertTrue($soldItem->isEbayFeedbackCompleted());
        $this->assertFalse($soldItem->isEbayFeedbackReceived());
        $this->assertEquals('ebay feedback comment type', $soldItem->getEbayFeedbackCommentType());

        $shopProductDetails = $soldItem->getShopProductDetails();

        $this->assertEquals(123, $shopProductDetails->getProductId());
        $this->assertEquals('ean', $shopProductDetails->getEan());
        $this->assertEquals(2.7, $shopProductDetails->getAnr());
        $this->assertEquals('unit of quantity', $shopProductDetails->getUnitOfQuantity());
        $this->assertEquals(4.7, $shopProductDetails->getBasepriceFactor());

        $baseProductData = $shopProductDetails->getBaseProductData();

        $this->assertEquals(5, $baseProductData->getBaseProductType());

        $childProduct = $baseProductData->getChildProduct();

        $this->assertEquals(8, $childProduct->getProductId());
        $this->assertEquals('product ean', $childProduct->getProductEan());
        $this->assertEquals(9, $childProduct->getProductAnr());
        $this->assertEquals('product name', $childProduct->getProductName());
        $this->assertEquals(14, $childProduct->getProductQuantity());
        $this->assertEquals(0.9, $childProduct->getProductVat());
        $this->assertEquals(8.2, $childProduct->getProductWeight());
        $this->assertEquals(3.5, $childProduct->getProductUnitPrice());

        $soldItemAttributes = $soldItem->getSoldItemAttributes();

        $this->assertCount(2, $soldItemAttributes);

        $this->assertEquals('attribute name', $soldItemAttributes[0]->getAttributeName());
        $this->assertEquals('attribute value', $soldItemAttributes[0]->getAttributeValue());
        $this->assertEquals(4, $soldItemAttributes[0]->getAttributePosition());

        $this->assertEquals('attribute name2', $soldItemAttributes[1]->getAttributeName());
        $this->assertEquals('attribute value2', $soldItemAttributes[1]->getAttributeValue());
        $this->assertEquals(8, $soldItemAttributes[1]->getAttributePosition());
    }

    /**
     * test deserialization of a response on success, assert Order/BuyerInfo
     */
    public function testDeserializationFromXmlOnSuccessBuyerInfo()
    {
        $updateSoldItemsResponse = $this->deserializeResponse('ResponseOnSuccessBuyerInfo.xml');

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
        $updateSoldItemsResponse = $this->deserializeResponse('ResponseOnSuccessShippingInfo.xml');

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
        $updateSoldItemsResponse = $this->deserializeResponse('ResponseOnError.xml');

        $this->assertEquals('Error', $updateSoldItemsResponse->getCallStatus());
        $this->assertEquals('GetSoldItems', $updateSoldItemsResponse->getCallName());
        $this->assertEquals(8, $updateSoldItemsResponse->getVersionId());

        $errorList = $updateSoldItemsResponse->getResult()->getErrors();

        $this->assertCount(1, $errorList);
        $this->assertEquals(11, $errorList[0]->getErrorCode());
        $this->assertEquals('something failed', $errorList[0]->getErrorDescription());
        $this->assertEquals('something really failed', $errorList[0]->getErrorLongDescription());
    }

    /**
     * @param string $fileName
     *
     * @return GetSoldItemsResponse
     */
    private function deserializeResponse($fileName) {
        $responseBody = file_get_contents(__DIR__ . '/../../../Data/GetSoldItems/' . $fileName);

        return $this->serializer->deserialize($responseBody, GetSoldItemsResponse::class, 'xml');
    }
}