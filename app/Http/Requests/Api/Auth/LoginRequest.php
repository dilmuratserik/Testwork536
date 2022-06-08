<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseRequest;

/**
 * Class LoginRequest
 *
 * @package App\Http\Requests\Api\Auth
 */
class LoginRequest extends BaseRequest
{
    /**
     * @return array
     */
    public function rules() : array
    {
        return [
            'email'     => 'required|email|exists:users',
            'password'  => 'required|string'
        ];
    }

    /**
     * @return array
     */
    public function messages() : array
    {
        return [
            'email.required'    => 'It is necessary to enter an E-mail.',
            'email.email'       => 'Invalid E-mail format\'а.',
            'email.exists'      => 'A user with such an E-mail was not found.',
            'password.required' => 'You need to enter a password.',
            'password.string'   => 'The password must be a string.',
        ];
    }
}
