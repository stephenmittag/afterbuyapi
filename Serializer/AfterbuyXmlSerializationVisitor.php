<?php

namespace Wk\AfterbuyApiBundle\Serializer;

use JMS\Serializer\Context;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * Class AfterbuyXmlSerializationVisitor
 * 
 * @package Wk\AfterbuyApiBundle\Serializer
 */
class AfterbuyXmlSerializationVisitor extends XmlSerializationVisitor
{
    /**
     * AfterbuyXmlSerializationVisitor constructor.
     */
    public function __construct()
    {
        parent::__construct(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()));
    }

    /**
     * @param mixed   $data
     * @param array   $type
     * @param Context $context
     * @return mixed|void
     */
    public function visitDouble($data, array $type, Context $context)
    {
        return parent::visitString(str_replace('.', ',', (string)$data), $type, $context);
    }
}
