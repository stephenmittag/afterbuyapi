<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class AbstractResponse
 */
class AbstractResponse extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CallStatus")
     * @var string
     */
    private $callStatus;

    /**
     * @Serializer\Type("string")
     * @Serializer\SerializedName("CallName")
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
}
