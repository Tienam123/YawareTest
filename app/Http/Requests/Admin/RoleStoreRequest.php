<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'role' => 'required|max:255|unique:roles,name',
            'permissions.*' => 'required|integer|exists:permissions,id|',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
