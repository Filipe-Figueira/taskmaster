<?php

namespace App\Http\Requests\TaskRequests;

use Illuminate\Foundation\Http\FormRequest;

class TaskUpdateRequest extends FormRequest
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
            'category_id' => 'nullable',
            'title' => ['required', 'min:3'],
            'description' => 'nullable',
            'priority' => 'nullable|in:Baixa,Média,Alta',
            'status' => 'nullable|in:Pendente,Atrasada,Concluída',
            'due_date' => 'nullable|date|after_or_equal:tomorrow'

        ];
    }
}
