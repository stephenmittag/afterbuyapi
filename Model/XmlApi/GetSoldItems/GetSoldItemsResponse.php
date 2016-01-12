<?php

namespace Wk\AfterbuyApi\Model\XmlApi\GetSoldItems;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Model\XmlApi\AbstractResponse;

/**
 * Class GetSoldItemsResponse
 *
 * @Serializer\XmlRoot("Afterbuy")
 */
class GetSoldItemsResponse extends AbstractResponse
{
    /**
     * @Serializer\Type("Wk\AfterbuyApi\Model\XmlApi\GetSoldItems\Result")
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