<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Propaganistas\LaravelPhone\Rules\Phone;
use Illuminate\Validation\Rules;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', new Phone('RU'), 'max:12'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле "Имя" обязательно для заполнения.',
            'name.string' => 'Поле "Имя" должно быть строкой.',
            'name.max' => 'Поле "Имя" не должно превышать 255 символов.',

            'surname.required' => 'Поле "Фамилия" обязательно для заполнения.',
            'surname.string' => 'Поле "Фамилия" должно быть строкой.',
            'surname.max' => 'Поле "Фамилия" не должно превышать 255 символов.',

            'phone.string' => 'Поле "Телефон" должно быть строкой.',
            'phone.phone' => 'Неправильный номер телефона.',
            'phone.max' => 'Поле "Телефон" не должно превышать 12 символов.',

            'email.required' => 'Поле "Электронная почта" обязательно для заполнения.',
            'email.string' => 'Поле "Электронная почта" должно быть строкой.',
            'email.lowercase' => 'Электронная почта должна быть в нижнем регистре.',
            'email.email' => 'Поле "Электронная почта" должно быть корректным адресом электронной почты.',
            'email.max' => 'Поле "Электронная почта" не должно превышать 255 символов.',
            'email.unique' => 'Эта электронная почта уже используется.',
        ];
    }
}
