<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;
use App\Http\Requests\PersonalRequest;
use Auth;

class PersonalController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return view
	 */
	public function index()
	{
		return view('personal/index');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return view
	 */
	public function edit()
	{
		$user = Auth::user();
        return view('personal/profile', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(PersonalRequest $request)
	{
        $data = $request->all();
        $data["password"] = bcrypt($data["password"]);
		$user = Auth::user();
        $user->update($data);
        return redirect('personal/profile');
	}
}
