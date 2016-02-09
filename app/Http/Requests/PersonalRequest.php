<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class PersonalRequest extends Request {

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
        $id = '';
        if ($this->get('email')) {
            $user = User::findByEmail($this->get('email'))->first();
            if ($user) {
                $id = ','.$user->id;
            }
        }
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email'.$id,
            'password' => 'required'
        ];
    }

}
