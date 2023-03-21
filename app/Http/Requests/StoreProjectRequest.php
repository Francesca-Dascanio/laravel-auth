<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Modifico indicando true per autorizzare qualunque tipo di admin a salvare dati
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required | max: 100',
            'slug' =>  'required | max: 100',
            'year' => 'required | numeric | min: 1930 | max: 2030'
            // Siccome image e description NON sono obbligatori provo a non metterli
        ];
    }
}
