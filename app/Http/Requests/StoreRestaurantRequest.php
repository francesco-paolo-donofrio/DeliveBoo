<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'required|max:255',
            'vat' => 'required',
    
        ];
    }
    public function messages(){
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.max' => 'Il nome non può avere piu di 255 caratteri',
            'address.required' => 'Il campo indirizzo è obbligatorio',
            'image.required' => 'Il campo immagine è obbligatorio',
            'vat.required' => 'Il campo VAT è obbligatorio',
        ];
    }
}
