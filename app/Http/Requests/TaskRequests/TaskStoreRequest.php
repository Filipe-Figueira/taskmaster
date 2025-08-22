<?php

namespace App\Http\Requests\TaskRequests;

use Illuminate\Foundation\Http\FormRequest;

class TaskStoreRequest extends FormRequest
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
            'user_id' => 'required',
            'category_id' => 'required',
            'title' => ['required', 'min:3'],
            'description' => 'nullable',
            'priority' => 'required|in:Baixa,Média,Alta',
            'due_date' => 'required|date|after_or_equal:tomorrow'

        ];
    }

    public function messages()
    {
        return [
            'due_date.after_or_equal' => 'Selecione uma data igual ou posterior à amanhã.'
        ];
    }
}
