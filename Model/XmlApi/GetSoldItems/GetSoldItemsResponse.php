<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractResponse;

/**
 * Class GetSoldItemsResponse
 *
 * @Serializer\XmlRoot("Afterbuy")
 */
class GetSoldItemsResponse extends AbstractResponse
{
    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\GetSoldItems\Result")
     * @Serializer\SerializedName("Result")
     * @var Result
     */
    private $result;

    /**
     * @return Result
     */
    public function getResult()
    {
        return $this->result;
    }
}