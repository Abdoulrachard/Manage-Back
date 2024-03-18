<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectFormRequest extends FormRequest
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
            'year' =>   ['required'],
            'project_name' => ['required'],
            'city' => ['required'],
            'descriptions' => ['required'],
            'developer' => ['required'],
            'maitre_ouvre' => ['required'],
            'cover' => ['required', 'mimes:jpg,bmp,png,jpeg' , 'max:2048'], 
        ];
    }
}
