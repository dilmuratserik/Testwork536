<?php

namespace App\Http\Requests\Dashboard;

use App\Http\Requests\Request;
use App\Support\Response\GeneralResponseTrait;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 * Class BaseRequest
 *
 * @package App\Http\Requests\Dashboard
 */
abstract class BaseRequest extends Request
{
    use GeneralResponseTrait;

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator) : void
    {
        $plainErrorsArray = [];
        foreach ($validator->errors()->getMessages() as $errorGroup) {
            if (is_array($errorGroup)) {
                $plainErrorsArray = array_merge($plainErrorsArray, $errorGroup);
            }
        }

        throw new HttpResponseException(
            $this->error($plainErrorsArray, null, [], null, 422)
        );
    }
}
