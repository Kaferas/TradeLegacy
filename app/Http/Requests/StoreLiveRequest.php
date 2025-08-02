<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLiveRequest extends FormRequest
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
            'title' => "required",
            'link_youtube' => "required",
            'type_social' => "required",
            'description_youtube' => "required",
        ];
    }
    public function messages()
    {
        return [
            'title.required' => "Le Titre est Obligatoire",
            'link_youtube.required' => "Le Lien est Obligatoire",
            'type_social.required' => "Le Type est Obligatoire",
            'description_youtube.required' => "Le Live doit avoir Obligatoirement la description",
        ];
    }
}
