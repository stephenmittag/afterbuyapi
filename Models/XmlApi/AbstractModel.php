<?php

namespace Wk\AfterbuyApi\Models\XmlApi;

/**
 * Class AbstractModel
 *
 * @package Wk\AfterbuyApi\Models\XmlApi
 */
class AbstractModel
{
    /**
     * @param string $value
     *
     * @return bool
     */
    public function setBooleanFromInteger($value)
    {
        return (bool)$value;
    }

    /**
     * @param bool $value
     *
     * @return int
     */
    public function getBooleanAsInteger($value) {
        return $value ? 1 : 0;
    }
}