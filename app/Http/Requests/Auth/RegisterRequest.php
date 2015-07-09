<?php namespace App\Http\Requests\Auth;
 
use Illuminate\Foundation\Http\FormRequest;
 
class RegisterRequest extends FormRequest {
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        	'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ];
    }
 
    public function messages()
    {
        return [
            'name.required' => 'Vui nhập tên của bạn!',
            'email.required' => 'Vui lòng nhập địa chỉ email của bạn!',
            'email.email' => 'Vui lòng nhập đúng địa chỉ email!',
            'email.users' => 'Địa chỉ email này đã được sử dụng cho tài khoản khác!',
            'password.required' => 'Vui lòng nhập mật khẩu của bạn!',
            'password.min' => 'Mật khẩu tối thiểu phải là 6 ký tự!',
            'password.confirmed' => 'Vui lòng nhập lại đúng mật khẩu của bạn!',

        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
 
}