<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'description' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,webp|max:5000',
            'price' => 'required|numeric|min:0.01',
            'visible' => 'required'
    
        ];
    }

    public function messages(){
        return [
            'name.required' => 'Il campo nome è obbligatorio',
            'name.max' => 'Il nome non può avere piu di 255 caratteri',
            'description.required' => 'Il campo descrizione è obbligatorio',
            'image.required' => 'Il campo immagine è obbligatorio',
            'price.required' => 'Il campo prezzo è obbligatorio',
            'visible' => 'Vuoi che questo prodotto sia già visibile sul menù del tuo ristorante?'
        ];
    }
}
