<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

final class SoldItemsUpdate implements XmlWebserviceInterface
{
    private $operationFieldOne = null;

    private $orderId = null;

    /**
     * @param string $fieldvalue
     *
     * @return object SoldItemsUpdate
     */
    public function setOperationFieldOne($fieldvalue)
    {
        $this->operationFieldOne = (string) $fieldvalue;

        return $this;
    }

    /**
     * @param int $orderid
     *
     * @return object SoldItemsUpdate
     */
    public function setOrderId($orderid)
    {
        $this->orderId = (int) $orderid;

        return $this;
    }

    /**
     * @return SimpleXMLElement
     */
    public function getData($credentials = array('partner_id' => '',
                                                    'partner_pass'=> '',
                                                    'user_id' => '',
                                                    'user_pass' => ''))
    {
        $DomElement = new \DOMDocument( "1.0", "UTF-8" );

        $requestEle = $DomElement->createElement('Request');
        $rootNode = $DomElement->appendChild($requestEle);

        $authEle = $DomElement->createElement('AfterbuyGlobal');
        $authData = $rootNode->appendChild($authEle);
        $authData->appendChild($DomElement->createElement('PartnerID', $credentials['partner_id']));
        $authData->appendChild($DomElement->createElement('PartnerPassword', $credentials['partner_pass']));
        $authData->appendChild($DomElement->createElement('UserID', $credentials['user_id']));

        $userpwd = $DomElement->createElement('UserPassword');
        $userpwd->appendChild($DomElement->createCDATASection($credentials['user_pass']));
        $authData->appendChild($userpwd);

        $authData->appendChild($DomElement->createElement('CallName', 'UpdateSoldItems'));
        $authData->appendChild($DomElement->createElement('DetailLevel', 0));
        $authData->appendChild($DomElement->createElement('ErrorLanguage', 'DE'));

        $orders = $rootNode->appendChild($DomElement->createElement('Orders'));

        $order = $orders->appendChild($DomElement->createElement('Order'));
        $order->appendChild($DomElement->createElement('OrderID', $this->orderId));
        $operationinfo = $order->appendChild($DomElement->createElement('VorgangsInfo'));
        $operationinfo->appendChild($DomElement->createElement('VorgangsInfo1', $this->operationFieldOne));

        return $DomElement->saveXML();
    }
}