<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractRequest
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class AbstractRequest extends AbstractModel
{
    /**
     * display process data only
     */
    const DETAIL_LEVEL_PROCESS_DATA = 0;

    /**
     * display payment data only
     */
    const DETAIL_LEVEL_PAYMENT_DATA = 2;

    /**
     * display buyer data only
     */
    const DETAIL_LEVEL_BUYER_DATA = 4;

    /**
     * display articles data only
     */
    const DETAIL_LEVEL_ARTICLES_DATA = 8;

    /**
     * display shipping data only
     */
    const DETAIL_LEVEL_SHIPPING_DATA = 16;

    /**
     * display articles data and custom attributes only
     */
    const DETAIL_LEVEL_CUSTOM_ATTRIBUTES = 32;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\AfterbuyGlobal")
     * @var AfterbuyGlobal
     */
    private $afterbuyGlobal;

    /**
     * @param string $userId
     * @param string $userPassword
     * @param int    $partnerId
     * @param string $partnerPassword
     * @param int    $detailLevel
     */
    public function __construct($userId, $userPassword, $partnerId, $partnerPassword, $detailLevel)
    {
        $this->afterbuyGlobal = new AfterbuyGlobal($userId, $userPassword, $partnerId, $partnerPassword, $detailLevel);
    }

    /**
     * @param int $detailLevel
     *
     * @return $this
     */
    public function setDetailLevel($detailLevel)
    {
        $this->afterbuyGlobal->setDetailLevel($detailLevel);

        return $this;
    }

    /**
     * @param string $callName
     *
     * @return $this
     */
    public function setCallName($callName)
    {
        $this->afterbuyGlobal->setCallName($callName);

        return $this;
    }
}