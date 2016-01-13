<?php

namespace Wk\AfterbuyApi\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractRequest
 */
class AbstractRequest extends AbstractModel
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\AfterbuyGlobal")
     * @Serializer\SerializedName("AfterbuyGlobal")
     * @var AfterbuyGlobal
     */
    private $afterbuyGlobal;

    /**
     * @param AfterbuyGlobal $afterbuyGlobal
     */
    public function __construct(AfterbuyGlobal $afterbuyGlobal)
    {
        $this->afterbuyGlobal = $afterbuyGlobal;
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