<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;

/**
 * Class Result
 */
class Result extends AbstractModel
{
    /**
     * @Serializer\Type("array<Wk\AfterbuyApi\Models\XmlApi\Response\Error>")
     * @Serializer\XmlList(entry="Error")
     * @var Error[]
     */
    private $errorList;

    /**
     * @return Error[]
     */
    public function getErrorList()
    {
        return $this->errorList;
    }
}