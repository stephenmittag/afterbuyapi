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
     * @var array
     */
    private $defaultFilters = array();

    /**
     * @var bool
     */
    private $mustHaveFeedbackDate;

    /**
     * set values for our API calls
     */
    public function __construct() {
        // from Afterbuy XML API documentation:
        // PaidAuctions have a payment date and are paid in full
        // CompletedAuctions have a payment date, are paid in full and have no shipping date
        $this->defaultFilters = array('PaidAuctions', 'not_CompletedAuctions');
        $this->mustHaveFeedbackDate = true;
    }

    /**
     * @param array $defaultFilters
     *
     * @return $this
     */
    public function setDefaultFilters(array $defaultFilters)
    {
        $this->defaultFilters = $defaultFilters;

        return $this;
    }

    /**
     * @return array
     */
    public function getDefaultFilters()
    {
        return $this->defaultFilters;
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
        $this->mustHaveFeedbackDate = $mustHaveFeedbackDate;

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
            $filterValues->appendChild($domElement->createElement('DateFrom', '01.01.2000 00:00:00'));
            $filterValues->appendChild($domElement->createElement('FilterValue', 'FeedbackDate'));
        }

        $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
        $filter->appendChild($domElement->createElement('FilterName', 'UserDefinedFlag'));
        $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));
        $filterValues->appendChild($domElement->createElement('FilterValue', $this->userDefinedFlag));

        if ($this->defaultFilters) {
            $filter = $dataFilter->appendChild($domElement->createElement('Filter'));
            $filter->appendChild($domElement->createElement('FilterName', 'DefaultFilter'));
            $filterValues = $filter->appendChild($domElement->createElement('FilterValues'));

            foreach ($this->defaultFilters as $defaultFilter) {
                $filterValues->appendChild($domElement->createElement('FilterValue', $defaultFilter));
            }
        }

        return $domElement->saveXML();
    }
}