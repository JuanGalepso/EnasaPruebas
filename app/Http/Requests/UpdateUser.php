<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Currentpass;

class UpdateUser extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'cedula'    => 'required|cedula|unique:users,cedula,' . $this->user,
      'name'      => 'required',
      'slug'      => 'required|slug|unique:users,slug,' . $this->user,
      'phone'      => 'required|integer',
      'username'  => 'required',
      'lastname'  => 'required',
      'email'     => 'required|email|unique:users,email,' . $this->user,
      'role'      => ['required', 'regex:/^(Administrador|Usuario)$/'],
      'password'  => 'required|confirmed|min:6',
      'status'    => 'required',
      'current_password' => ['required', new Currentpass],
    ];
  }
}
