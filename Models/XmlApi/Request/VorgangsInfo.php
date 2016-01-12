<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Request;

use JMS\Serializer\Annotation as Serializer;

/**
 * Class VorgangsInfo
 */
class VorgangsInfo extends AbstractModel
{
    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $vorgangsInfo1;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $vorgangsInfo2;

    /**
     * @Serializer\Type("string")
     * @var string
     */
    private $vorgangsInfo3;

    /**
     * @return string
     */
    public function getVorgangsInfo1()
    {
        return $this->vorgangsInfo1;
    }

    /**
     * @param string $vorgangsInfo1
     *
     * @return $this
     */
    public function setVorgangsInfo1($vorgangsInfo1)
    {
        $this->vorgangsInfo1 = $vorgangsInfo1;

        return $this;
    }

    /**
     * @return string
     */
    public function getVorgangsInfo2()
    {
        return $this->vorgangsInfo2;
    }

    /**
     * @param string $vorgangsInfo2
     *
     * @return $this
     */
    public function setVorgangsInfo2($vorgangsInfo2)
    {
        $this->vorgangsInfo2 = $vorgangsInfo2;

        return $this;
    }

    /**
     * @return string
     */
    public function getVorgangsInfo3()
    {
        return $this->vorgangsInfo3;
    }

    /**
     * @param string $vorgangsInfo3
     *
     * @return $this
     */
    public function setVorgangsInfo3($vorgangsInfo3)
    {
        $this->vorgangsInfo3 = $vorgangsInfo3;

        return $this;
    }
}