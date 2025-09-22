<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('anyAction', Auth::user());
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => 'current_password',
            'password' => ['required', 'confirmed', Password::min(8)->mixedCase()->symbols()],
            'password_confirmation' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'current_password.current_password' => 'Algo deu errado! Tente novamente mais tarde',
        ];
    }
}
