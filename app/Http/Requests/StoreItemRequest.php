<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
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
            "category_id"       => ['required', 'integer'],
            "name"              => ['required', 'string'],
            "price"             => ['required', 'numeric'],
            "discount"          => ['nullable', 'numeric'],
            "gst"               => ['nullable', 'numeric'],
            "description"       => ['required', 'min:10', 'max:255'],
            "meta_title"        => ['required', 'min:10', 'max:255'],
            "meta_description"  => ['required', 'min:10', 'max:255'],
            "meta_keywords"     => ['required', 'min:10', 'max:255'],
            "is_featured"       => ['required', 'boolean'],
            "is_best_seller"    => ['required', 'boolean'],
            "is_active"         => ['required', 'boolean'],
        ];
    }
}
