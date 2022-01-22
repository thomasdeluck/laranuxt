<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
    public function rules()
    {
        $required = !$this->role ? 'required|' : '';

        return [
            'name' => $required . 'max:255|unique:roles,name,' . ($this->role->id ?? 0),
            'permissions.*' => 'integer|min:0',
        ];
    }
}
