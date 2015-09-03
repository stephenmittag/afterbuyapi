<?php

namespace Wk\AfterbuyApi\Models\XmlApi;


final class SoldItemsList implements XmlWebserviceInterface
{

    private $auctionenddate = null;

    private $feedbackdate = null;

    /**
     * e.g. 27.08.2015 00:00:00
     *
     * @param string $date
     *
     * @return object SoldItemsList
     */
    public function setAuctionEndDate($date)
    {
        $this->auctionenddate = (string) $date;

        return $this;
    }

    /**
     * e.g. 27.10.2015 23:59:59
     *
     * @param string $date
     *
     * @return object SoldItemsList
     */
    public function setFeedbackDate($date)
    {
        $this->feedbackdate = (string) $date;

        return $this;
    }


    /**
     * @return DOMDocument
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

        $authData->appendChild($DomElement->createElement('CallName', 'GetSoldItems'));
        $authData->appendChild($DomElement->createElement('DetailLevel', 0));
        $authData->appendChild($DomElement->createElement('ErrorLanguage', 'DE'));

        $rootNode->appendChild($DomElement->createElement('RequestAllItems', 1));

        $dataFilter = $rootNode->appendChild($DomElement->createElement('DataFilter'));

        $filter = $dataFilter->appendChild($DomElement->createElement('Filter'));
        $filter->appendChild($DomElement->createElement('FilterName', 'DateFilter'));
        $filterValues = $filter->appendChild($DomElement->createElement('FilterValues'));
        $filterValues->appendChild($DomElement->createElement('DateFrom', $this->auctionenddate));
        $filterValues->appendChild($DomElement->createElement('DateTo', $this->feedbackdate));
        $filterValues->appendChild($DomElement->createElement('FilterValue', 'AuctionEndDate'));
        $filterValues->appendChild($DomElement->createElement('FilterValue', 'FeedbackDate'));

        $filter = $dataFilter->appendChild($DomElement->createElement('Filter'));
        $filter->appendChild($DomElement->createElement('FilterName', 'DefaultFilter'));
        $filterValues = $filter->appendChild($DomElement->createElement('FilterValues'));
        $filterValues->appendChild($DomElement->createElement('FilterValue', 'PaidAuctions'));

        return $DomElement->saveXML();
    }
}