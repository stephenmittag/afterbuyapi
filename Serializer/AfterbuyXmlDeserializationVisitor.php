<?php

namespace Wk\AfterbuyApiBundle\Serializer;

use JMS\Serializer\Context;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\XmlDeserializationVisitor;

/**
 * Class AfterbuyXmlDeserializationVisitor
 * 
 * @package Wk\AfterbuyApiBundle\Serializer
 */
class AfterbuyXmlDeserializationVisitor extends XmlDeserializationVisitor
{
    /**
     * AfterbuyXmlDeserializationVisitor constructor.
     */
    public function __construct()
    {
        parent::__construct(new SerializedNameAnnotationStrategy(new CamelCaseNamingStrategy()));
    }

    /**
     * @param mixed   $data
     * @param array   $type
     * @param Context $context
     * @return float|mixed
     */
    public function visitDouble($data, array $type, Context $context)
    {
        return parent::visitDouble((double)str_replace(',', '.', (string)$data), $type, $context);
    }
}
