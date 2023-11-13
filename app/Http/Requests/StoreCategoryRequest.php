<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'parent_id'         => ['required', 'integer'],
            'name'              => ['required', 'string'],
            'url'               => ['required', 'string', 'unique:categories,url'],
            'discount'          => ['nullable', 'numeric'],
            'description'       => ['required', 'min:10', 'max:255'],
            'meta_title'        => ['required', 'min:10', 'max:255'],
            'meta_description'  => ['required', 'min:10', 'max:255'],
            'meta_keywords'     => ['required', 'min:10', 'max:255'],
            'is_active'         => ['required', 'boolean'],

        ];
    }
}
