<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\Permission\Models\Role;

class UserCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => '|required|max:255|min:4|string|',
            'email' => '|required|email|string|max:255|unique:users,email|',
            'password' => '|required|min:6|string|confirmed|',
            'role' => '|required|string|'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
