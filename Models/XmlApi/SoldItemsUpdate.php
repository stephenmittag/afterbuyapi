<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

/**
 * Class SoldItemsUpdate
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
final class SoldItemsUpdate extends AbstractXmlWebservice
{
    /**
     * @var null | string
     */
    private $operationFieldOne;

    /**
     * @var null | string
     */
    private $invoiceMemo;

    /**
     * @var int
     */
    private $orderId = 0;

    /**
     * @return null|string
     */
    public function getInvoiceMemo()
    {
        return $this->invoiceMemo;
    }

    /**
     * @param null|string $invoiceMemo
     *
     * @return $this
     */
    public function setInvoiceMemo($invoiceMemo)
    {
        $this->invoiceMemo = (string) $invoiceMemo;

        return $this;
    }

    /**
     * @param string $fieldValue
     *
     * @return $this
     */
    public function setOperationFieldOne($fieldValue)
    {
        $this->operationFieldOne = (string) $fieldValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperationFieldOne()
    {
        return $this->operationFieldOne;
    }

    /**
     * @return int
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     *
     * @return $this
     */
    public function setOrderId($orderId)
    {
        $this->orderId = (int) $orderId;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getData(array $credentials)
    {
        $domElement = new \DOMDocument("1.0", "UTF-8");

        $requestEle = $domElement->createElement('Request');
        $rootNode = $domElement->appendChild($requestEle);

        $authEle = $domElement->createElement('AfterbuyGlobal');
        $authData = $rootNode->appendChild($authEle);
        $authData->appendChild($domElement->createElement('PartnerID', $credentials['partner_id']));
        $authData->appendChild($domElement->createElement('PartnerPassword', $credentials['partner_pass']));
        $authData->appendChild($domElement->createElement('UserID', $credentials['user_id']));

        $userpwd = $domElement->createElement('UserPassword');
        $userpwd->appendChild($domElement->createCDATASection($credentials['user_pass']));
        $authData->appendChild($userpwd);

        $authData->appendChild($domElement->createElement('CallName', 'UpdateSoldItems'));
        $authData->appendChild($domElement->createElement('DetailLevel', 0));
        $authData->appendChild($domElement->createElement('ErrorLanguage', 'DE'));

        $orders = $rootNode->appendChild($domElement->createElement('Orders'));

        $order = $orders->appendChild($domElement->createElement('Order'));
        $order->appendChild($domElement->createElement('OrderID', $this->orderId));
        $order->appendChild($domElement->createElement('InvoiceMemo', $this->invoiceMemo));
        $order->appendChild($domElement->createElement('UserDefinedFlag', $this->userDefinedFlag));

        return $domElement->saveXML();
    }
}