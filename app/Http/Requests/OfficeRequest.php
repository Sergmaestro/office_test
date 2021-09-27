<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255|unique:offices,name,' . $this->id,
            'description' => 'nullable|string|max:65535',
            'email' => 'nullable|email|max:255',
            'slug' => 'nullable|required_with:id|string|max:255|unique:offices,slug,' . $this->id,
            'location' => 'required|array',
            'location.name' => 'required|string|max:255',
            'location.country_id' => 'required|integer',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'slug.required_with' => 'The slug field is required',
            'location.name.required' => 'The location field is required',
            'location.country_id.required' => 'The country field is required',
        ];
    }
}
