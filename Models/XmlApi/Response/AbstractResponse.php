<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Response;

use JMS\Serializer\Annotation as Serializer;
use Wk\AfterbuyApi\Models\XmlApi\AbstractModel;

/**
 * Class AbstractResponse
 */
class AbstractResponse extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $callStatus;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $callName;

    /**
     * @Serializer\Type("integer")
     * @Serializer\SerializedName("VersionID")
     * @var int
     */
    private $versionId;

    /**
     * @Serializer\Type("Wk\AfterbuyApi\Models\XmlApi\Response\Result")
     * @var Result
     */
    private $result;

    /**
     * @return string
     */
    public function getCallStatus()
    {
        return $this->callStatus;
    }

    /**
     * @return string
     */
    public function getCallName()
    {
        return $this->callName;
    }

    /**
     * @return int
     */
    public function getVersionId()
    {
        return $this->versionId;
    }

    /**
     * @return Result
     */
    public function getResult()
    {
        return $this->result;
    }
}