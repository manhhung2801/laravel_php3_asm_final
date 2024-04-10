<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            "name" => ['required'],
            "thumb_image" => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:5000'],
            "quantity" => ['required', 'integer'],
            "short_description" => ['required', 'string'],
            "long_description" => ['required', 'string'],
            "price" => ['required', 'integer'],
            "offer_price" => ['integer'],
            "product_type" => ['string'],
            "status" => ['required'],
            "category_id" => ['required'],
        ];
    }
}
