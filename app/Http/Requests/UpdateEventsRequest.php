<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventsRequest extends FormRequest
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
            'title' => "required|string|max:50",
            'from_hour' => "required",
            'to_hour' => "required",
            'location_event' => "required",
            'description_event' => "required|min:30",
        ];
    }

    public function messages()
    {
        return [
            'title.required' => "Le titre est requis",
            'title.max' => "La taille Max du title est de 50 Caracteres",
            'from_hour.required' => "la date de depart requis",
            'to_hour.required' => "La date de Fin requis",
            'location_event.required' => "La localisation Important",
            'description_event.required' => "La description est requis",
            'description_event.min' => "La taille minimun est de 30 caracteres",
        ];
    }
}
