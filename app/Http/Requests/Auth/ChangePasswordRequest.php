<?php

namespace App\Http\Requests\Auth;

use App\Rules\CurrentPasswordRule;
use App\Rules\NewPasswordRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return array_merge(
            CurrentPasswordRule::rules(),
            NewPasswordRule::rules(),
        );
    }

    public function messages(): array
    {
        return array_merge(
            CurrentPasswordRule::messages(),
            NewPasswordRule::messages(),
        );
    }
}
