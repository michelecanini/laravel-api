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
            'title' => 'required|max:50',
            'thumb' => 'image',
            //'github' => 'required|max:255', //non richiesto in caso di progetti privati
            'type_id' => 'required|exists:types,id',
            'technology_id' => 'exists:technologies,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo deve essere lungo massimo :max caratteri',
            'thumb.image' => "il file allegato deve essere di tipo immagine (jpg, png...)",
            //'github.required' => "l'url della reposity github è obbligatoria",
            //'github.max' => "l'url della reposity github deve essere lunga massimo :max caratteri",
            'type_id.required' => "devi selezionare una tipologia di progetto",
            'type_id.exists' => "la categoria da te selezionata non è valida",
            'technology_id.exists' => "la tipologia da te selezionata non è valida",
        ];
    }
}
