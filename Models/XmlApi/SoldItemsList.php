<?php

namespace Wk\AfterbuyApi\Models\XmlApi;


final class SoldItemsList implements XmlWebserviceInterface
{

    private $userDefinedFlag = 0;

    private $filterValue = 'PaidAuctions';

    /**
     * @param string $value
     *
     * @return object SoldItemsList
     */
    public function setDefaultFilter($value)
    {
        $this->filterValue = (string) $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultFilter()
    {
        return $this->filterValue;
    }

    /**
     * @param int $value
     *
     * @return object SoldItemsList
     */
    public function setUserDefinedFlag($value)
    {
        $this->userDefinedFlag = (int) $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getUserDefinedFlag()
    {
        return $this->userDefinedFlag;
    }

    /**
     * @return string
     */
    public function getData(array $credentials)
    {
        $domElement = new \DOMDocument( "1.0", "UTF-8" );

        $requestEle = $domElement->createElement('Request');
        $rootNode = $domElement->appendChild($requestEle);

        $authEle = $domElement->createElement('AfterbuyGlobal');
        $authData = $rootNode->appendChild($authEle);
        $authData->appendChild($domElement->createElement('PartnerID', $credentials['partner_id']));
        $authData->appendChild($domElement->createElement('PartnerPassword', $credentials['partner_pass']));
        $authData->appendChild($domElement->createElement('UserID', $credentials['user_id']));

        $userPwd = $domElement->createElement('UserPassword');
        $userPwd->appendChild($domElement->createCDATASection($credentials['user_pass']));
        $authData->appendChild($userPwd);

        $authData->appendChild($domElement->createElement('CallName', 'GetSoldItems'));
        $authData->appendChild($domElement->createElement('DetailLevel', 0));
        $authData->appendChild($domElement->createElement('ErrorLanguage', 'DE'));

        $rootNode->appendChild($domElement->createElement('RequestAllItems', 1));

        $dataFilter = $rootNode->appendChild($domElement->createElement('DataFilter'));

        $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
        $filter->appendChild($domElement->createElement('FilterName', 'UserDefinedFlag'));
        $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));
        $filterValues->appendChild($domElement->createElement('FilterValue', $this->userDefinedFlag));

        $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
        $filter->appendChild($domElement->createElement('FilterName', 'DefaultFilter'));
        $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));
        $filterValues->appendChild($domElement->createElement('FilterValue', $this->filterValue));

        return $domElement->saveXML();
    }
}