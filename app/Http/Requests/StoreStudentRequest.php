<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'email' => 'required|unique:teachers,email,' . $this->id,
            'password' => 'required',
            'name' => 'required',
            'name_en' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'birth_date' => 'required|date',
            'grade' => 'required',
            'classroom' => 'required',
            'section' => 'required',
            'academic_year' => 'required',
        ];
    }
}
