<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerProductValidation extends FormRequest
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
            'product_name' => ['required', 'max:255'],
            'product_description' => ['required', 'min:50'],
            'product_image' => 'required|image|mimes:jpeg,png,jpg|max:6144',
            'product_category' => 'required',
            'quantity' => 'required|numeric',
            'product_price_original' => 'required|numeric',
            'product_price_revised' => 'required|numeric',
            'tags' => 'required',
            'product_discount_till' => 'required',
            'product_key_points' => 'required',
            'quantity' => 'required|numeric',
        ];
    }
}
