<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create() 
    {
    	return view('auth.register');
    }

    public function store(Request $request)
    {
	$this->validate($request, [
		'username' => 'required|unique:users',
		'email' => 'required|unique:users',
		'password' => 'required|min:8',
		'password_confirm' => 'required|min:8'
	]);

	$password = $request->password;
	$password_confirm = $request->password_confirm;

	if($password != $password_confirm) {
	  Session::flash('status', 'failed');
	  Session::flash('message', 'Password do not match!');
	  return redirect()
		->back()
	  	->withInput();
	}

	User::create([
		'username' => $request->username,
		'email' => $request->email,
		'password' => hash::make($request->password)
	]);

	return redirect()
		->route('login');

    }
}
