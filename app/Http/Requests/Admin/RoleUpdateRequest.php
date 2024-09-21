<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'role' => 'required|max:255|',
            'permissions' => 'required',
            'permissions.*' => 'required|integer|exists:permissions,id|',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
