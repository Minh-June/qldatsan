<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Cho phép tất cả người dùng
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'fullname' => 'required|string|max:255',
            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'phonenb' => 'required|string|max:10|regex:/^[0-9]+$/',
            'email' => 'required|string|email|max:255|unique:user,email',
            'username' => 'required|string|max:255|unique:user,username',
            'password' => 'required|string|min:6',
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Họ và tên là bắt buộc.',
            'gender.required' => 'Giới tính là bắt buộc.',
            'birthdate.required' => 'Ngày sinh là bắt buộc.',
            'phonenb.required' => 'Số điện thoại là bắt buộc.',
            'phonenb.regex' => 'Số điện thoại chỉ được chứa các ký tự số.',
            'email.required' => 'Email là bắt buộc.',
            'email.unique' => 'Email đã được sử dụng.',
            'username.required' => 'Tên người dùng là bắt buộc.',
            'username.unique' => 'Tên người dùng đã được sử dụng.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}
