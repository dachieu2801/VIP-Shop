<?php

namespace Beike\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        if (! $this->id) {
            $rules['email'] = 'required|email:rfc|unique:admin_users,email';
        } else {
            $rules['email'] = 'required|email:rfc|unique:admin_users,email,' . $this->id;
        }

        return $rules;
    }

    public function attributes()
    {
        return [
            'email' => trans('user.email'),
        ];
    }
}
