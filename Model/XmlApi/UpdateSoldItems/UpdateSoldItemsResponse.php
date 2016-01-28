<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractResponse;
use Wk\AfterbuyApiBundle\Model\XmlApi\Result;

/**
 * Class UpdateSoldItemsResponse
 *
 * @Serializer\XmlRoot("Afterbuy")
 */
class UpdateSoldItemsResponse extends AbstractResponse
{
    /**
     * @Serializer\Type("Wk\AfterbuyApiBundle\Model\XmlApi\Result")
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
