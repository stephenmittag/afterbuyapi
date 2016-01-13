<?php

namespace Wk\AfterbuyApi\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class Error
 */
class Error extends AbstractModel
{
    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("ErrorCode")
     * @var int
     */
    private $errorCode;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ErrorDescription")
     * @var string
     */
    private $errorDescription;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("ErrorLongDescription")
     * @var string
     */
    private $errorLongDescription;

    /**
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorDescription()
    {
        return $this->errorDescription;
    }

    /**
     * @return string
     */
    public function getErrorLongDescription()
    {
        return $this->errorLongDescription;
    }
}