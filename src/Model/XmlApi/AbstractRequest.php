<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractRequest
 */
class AbstractRequest
{
    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\AfterbuyGlobal")
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
