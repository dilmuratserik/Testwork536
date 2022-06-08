<?php

namespace App\Http\Requests\Api\Item;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class CreateRequest
 *
 * @package App\Http\Requests\Api\Contact
 */
class CreateRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'name'          => 'required|string|unique:items,name',
            'description'   => 'string|nullable',
            'price'         => 'required|integer'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'name.required'         => 'You must enter the name of the product.',
            'name.string'           => 'The product name must be a string.',
            'name.unique'           => 'A product with this name already exists.',
            'description.string'    => 'The product description should be a string.',
            'price.required'        => 'It is necessary to enter the price of the product.',
            'price.integer'         => 'The price of the product must be an integer.'
        ];
    }
}
