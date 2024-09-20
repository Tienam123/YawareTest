<?php

namespace App\Http\Requests\Admin;

class UserCreateRequest{
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
