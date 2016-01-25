<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Validator;
use Auth;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

    /**
     * Trying to authorize the user. Return json if success or not.
     *
     * @param Request $request
     * @return json
     */
    public function authenticate(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['email' => $data['USER_LOGIN'], 'password' => $data['USER_PASSWORD']]))
        {
            return json_encode(array("status" => "success"));
        }
        return json_encode(array("status" => "error", "info" => "Неверный логин или пароль"));
    }


    public function register(Request $request)
    {
        $data = $request->all();

        $rules = ['email'=>'required|email|unique:users'];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            // handler errors
            $erros = $validator->errors()->toArray();
            foreach($erros as $err) {
                foreach($err as $er) {
                    return json_encode(array("status" => "error", "info" => $er));
                }
            }
        }
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        if ($user->save()) {
            Auth::login($user);
            return json_encode(array("status" => "success"));
        }
    }
}
