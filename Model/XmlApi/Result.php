<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Result
 */
class Result extends AbstractModel
{
    /**
     * @Serializer\Type("array<Wk\AfterbuyApiBundle\Model\XmlApi\Error>")
     * @Serializer\SerializedName("ErrorList")
     * @Serializer\XmlList(entry="Error")
     * @var Error[]
     */
    protected $errors;

    /**
     * @return Error[]
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
