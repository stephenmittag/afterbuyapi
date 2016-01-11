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
    public function __construct($userId, $userPassword, $partnerId, $partnerPassword, $detailLevel) {
        $this->afterbuyGlobal = new AfterbuyGlobal($userId, $userPassword, $partnerId, $partnerPassword, $detailLevel);
    }

    /**
     * @param int $detailLevel
     *
     * @return $this
     */
    public function setDetailLevel($detailLevel) { // TODO set value using constants
        $this->afterbuyGlobal->setDetailLevel($detailLevel);

        return $this;
    }

    /**
     * @param string $callName
     *
     * @return $this
     */
    public function setCallName($callName) {
        $this->afterbuyGlobal->setCallName($callName);

        return $this;
    }
}