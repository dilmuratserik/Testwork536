<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Request;
use App\Support\Response\ApiResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class BaseRequest
 *
 * @package App\Http\Requests\Api\
 */
abstract class BaseRequest extends Request
{
    use ApiResponseTrait;

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $plainErrorsArray = [];
        foreach ($validator->errors()->getMessages() as $errorGroup) {
            if (is_array($errorGroup)) {
                $plainErrorsArray = array_merge($plainErrorsArray, $errorGroup);
            }
        }

        throw new HttpResponseException(
            $this->respondWithValidationError($plainErrorsArray)
        );
    }
}
