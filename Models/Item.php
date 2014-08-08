<?php

namespace Wk\AfterBuyApi\Models;

use Wk\AfterBuyApi\Models\Base\BaseItem;

/**
 * Class Item
 */
class Item extends BaseItem
{
    /**
     * @param Article $article
     */
    public function addArticle($article)
    {
        $this->articles[] = $article;
    }
}