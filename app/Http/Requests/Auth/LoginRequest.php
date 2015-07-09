<?php namespace App\Http\Requests\Auth;
 
use Illuminate\Foundation\Http\FormRequest;
 
class LoginRequest extends FormRequest {
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }
 
    public function messages()
    {
        return [

            'email.required' => 'Vui lòng nhập địa chỉ email của bạn!',
            'email.email' => 'Vui lòng nhập đúng địa chỉ email!',
            'password.required' => 'Vui lòng nhập mật khẩu của bạn!',

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