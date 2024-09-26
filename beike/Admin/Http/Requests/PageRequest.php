<?php


namespace Beike\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        $rules = [
            'descriptions.*.title'   => 'required|string|min:3|max:128',
            'descriptions.*.summary' => 'string|max:180',
            'descriptions.*.content' => 'required|string',
            'descriptions.*.locale'  => 'required|string',
        ];

        return $rules;
    }

    public function attributes()
    {
        return [
            'title'   => trans('page.title'),
            'content' => trans('page.content'),
        ];
    }
}
