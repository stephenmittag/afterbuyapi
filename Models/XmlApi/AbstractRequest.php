<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractRequest
 *
 * @Serializer\XmlRoot("Request")
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class AbstractRequest extends AbstractModel
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\AfterbuyGlobal")
     * @var AfterbuyGlobal
     */
    protected $afterbuyGlobal;

    /**
     * @return AfterbuyGlobal
     */
    public function getAfterbuyGlobal()
    {
        return $this->afterbuyGlobal;
    }

    /**
     * @param AfterbuyGlobal $afterbuyGlobal
     *
     * @return $this
     */
    public function setAfterbuyGlobal(AfterbuyGlobal $afterbuyGlobal = null)
    {
        $this->afterbuyGlobal = $afterbuyGlobal;

        return $this;
    }
}