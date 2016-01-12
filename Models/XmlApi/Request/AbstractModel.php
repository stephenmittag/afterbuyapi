<?php

namespace Wk\AfterbuyApi\Models\XmlApi\Request;

/**
 * Class AbstractModel
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
        if (is_null($value)) {
            return null;
        }

        return (bool)$value;
    }

    /**
     * @param bool $value
     *
     * @return int
     */
    public function getBooleanAsInteger($value)
    {
        if (is_null($value)) {
            return null;
        }

        return $value ? 1 : 0;
    }
}