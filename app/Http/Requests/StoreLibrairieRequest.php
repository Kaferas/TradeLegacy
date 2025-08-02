<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLibrairieRequest extends FormRequest
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
            "title" => "required",
            "book_path" => "required|mimetypes:application/pdf|max:10000",
            "description_livre" => "required"
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Le titre est Obligatoire",
            "book_path.required" => "Le Livre est Obligatoire",
            "description_livre.required" => "La description du Livre Obligatoire",
            "book_path.mimetypes" => "La Livre doit etre au format Pdf",
            "book_path.max" => "La Livre doit etre au format Pdf",
        ];
    }
}
