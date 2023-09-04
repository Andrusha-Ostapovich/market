<?php

namespace App\Http\Requests;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'name' => 'required|min:2|max:255',
                'brand' => 'required|max:255',
                'article' => 'required|max:15',
                'old_price' => 'required|max:7',
                'price' => 'required|max:7',
                'description' => 'required|max:255',
                'main_category_id' => 'required',
                'product_photo' => 'required',
           
            
        ];
    }
}
