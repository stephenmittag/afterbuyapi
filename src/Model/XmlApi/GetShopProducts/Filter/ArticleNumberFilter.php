<?php

namespace Wk\AfterbuyApiBundle\Model\XmlApi\GetShopProducts\Filter;

use Wk\AfterbuyApiBundle\Model\XmlApi\AbstractFilter;

/**
 * Class ArticleNumberFilter
 */
class ArticleNumberFilter extends AbstractFilter
{
    /**
     * @param int $anr
     */
    public function __construct($anr)
    {
        parent::__construct('Anr');
        $this->filterValues['FilterValue'] = strval($anr);
    }
}
