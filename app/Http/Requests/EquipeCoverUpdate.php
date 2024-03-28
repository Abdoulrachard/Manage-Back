<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipeCoverUpdate extends FormRequest
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
            'name' =>   ['required'],
            'posted' => ['required'],
            'domaine_competence' => ['required'],
            'descriptions' => ['required'],
            'formations' => ['required'],
            'selections' => ['required'],
            'affilations' => ['nullable'],
            'curiculum' => ['nullable'],
            'links' => ['nullable'],
            // 'cover' => ['required', 'mimes:jpg,bmp,png,jpeg' , 'max:2048'],
            'additional_images.*' => ['nullable', 'image', 'mimes:jpg,bmp,png,jpeg', 'max:2048'], 
        ];
    }
}