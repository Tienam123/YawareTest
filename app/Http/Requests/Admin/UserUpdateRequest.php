<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' =>'|required|max:255|min:4|string|',
            'email' => '|required|email|max:255|unique:users,id,' . $this->user->id,
            'password' =>'|required|min:6|string|confirmed|',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
