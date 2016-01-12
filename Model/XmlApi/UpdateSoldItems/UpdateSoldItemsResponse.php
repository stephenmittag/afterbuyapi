<?php

namespace Wk\AfterbuyApi\Model\XmlApi\UpdateSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractResponse;
use Wk\AfterbuyApi\Model\XmlApi\Result;

/**
 * Class UpdateSoldItemsResponse
 *
 * @Serializer\XmlRoot("Afterbuy")
 */
class UpdateSoldItemsResponse extends AbstractResponse
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\Result")
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