<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

/**
 * Class SoldItemsList
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
final class SoldItemsList extends AbstractXmlWebservice
{
    /**
     * @var string
     */
    private $defaultFilter = 'PaidAuctions';

    /**
     * @var bool
     */
    private $mustHaveFeedbackDate = true;

    /**
     * @param string $value
     *
     * @return $this
     */
    public function setDefaultFilter($value)
    {
        $this->defaultFilter = (string) $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultFilter()
    {
        return $this->defaultFilter;
    }

    /**
     * @return bool
     */
    public function getMustHaveFeedbackDate()
    {
        return $this->mustHaveFeedbackDate;
    }

    /**
     * @param bool $mustHaveFeedbackDate
     *
     * @return $this
     */
    public function setMustHaveFeedbackDate($mustHaveFeedbackDate)
    {
        $this->mustHaveFeedbackDate = (bool) $mustHaveFeedbackDate;

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

        $userPwd = $domElement->createElement('UserPassword');
        $userPwd->appendChild($domElement->createCDATASection($credentials['user_pass']));
        $authData->appendChild($userPwd);

        $authData->appendChild($domElement->createElement('CallName', 'GetSoldItems'));
        $authData->appendChild($domElement->createElement('DetailLevel', 0));
        $authData->appendChild($domElement->createElement('ErrorLanguage', 'DE'));

        $rootNode->appendChild($domElement->createElement('RequestAllItems', 1));

        $dataFilter = $rootNode->appendChild($domElement->createElement('DataFilter'));

        if ($this->mustHaveFeedbackDate) {
            $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
            $filter->appendChild($domElement->createElement('FilterName', 'DateFilter'));
            $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));
            $filterValues->appendChild($domElement->createElement('FilterValue', 'FeedbackDate'));
            $filterValues->appendChild($domElement->createElement('DateFrom', '01.01.2000 00:00:00'));
        }

        $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
        $filter->appendChild($domElement->createElement('FilterName', 'UserDefinedFlag'));
        $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));
        $filterValues->appendChild($domElement->createElement('FilterValue', $this->userDefinedFlag));

        $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
        $filter->appendChild($domElement->createElement('FilterName', 'DefaultFilter'));
        $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));
        $filterValues->appendChild($domElement->createElement('FilterValue', $this->defaultFilter));

        return $domElement->saveXML();
    }
}