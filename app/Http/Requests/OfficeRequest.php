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
            'name' => 'required|string|max:255|unique:organizations,name,' . $this->id,
            'description' => 'nullable|string|max:65535',
            'logo' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'slug' => 'nullable|required_with:id|string|max:255|unique:organizations,slug,' . $this->id,
            'tmpFile' => 'sometimes|array',
            'tmpFile.fileName' => 'required_with:tmpFile|string',
            'tmpFile.file' => 'required_with:tmpFile|string',
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'slug.required_with' => 'The slug field is required',
            'tmpFile.array' => 'Invalid logo image',
            'tmpFile.fileName' => 'Invalid logo image',
            'tmpFile.file' => 'Invalid logo image',
        ];
    }
}
