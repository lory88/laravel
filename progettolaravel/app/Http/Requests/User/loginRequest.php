<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() // request che lavora sia in POST che in GET
    {
        return $this->isMethod('post') ? [
            'email' => ['required', 'email'],//users = nome tabella, email = nome campo
            'password' => ['required', 'min:8']
        ] : []; // altrimenti, se la richiesta e# in get, le regole di validazione sono vuote, non devono essere applicate
    } // usiamo un ternario con condizione isMethod }