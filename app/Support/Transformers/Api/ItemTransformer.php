<?php

namespace App\Support\Transformers\Api;

use App\Models\Item;
use App\Support\Transformers\BaseTransformer;

/**
 * Class ItemTransformer
 *
 * @package App\Support\Transformers\Api
 */
class ItemTransformer extends BaseTransformer
{
    /**
     * @param Item $item
     *
     * @return array
     */
    public function transform(Item $item) : array
    {
        return [
            'id'            => $item->id,
            'name'          => $item->name,
            'description'   => $item->description,
            'price'         => $item->price
        ];
    }

    /**
     * @return string
     */
    public function getItemKey() : string
    {
        return 'item';
    }

    /**
     * @return string
     */
    public function getCollectionKey() : string
    {
        return 'items';
    }
}
