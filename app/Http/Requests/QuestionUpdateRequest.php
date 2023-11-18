<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
            'question' => 'required|max:255',
            'category' => 'required|in:numeric,verbal,logika',
            'first_choice' => 'required|max:255',
            'second_choice' => 'required|max:255',
            'third_choice' => 'required|max:255',
            'fourth_choice' => 'required|max:255',
            'answer' => 'required|in:a,b,c,d',
        ];
    }
}
