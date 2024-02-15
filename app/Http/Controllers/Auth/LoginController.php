<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login() 
    {
    	return view('auth.login');
    }

    public function auth(Request $request) 
    {
	$credentials = $request->validate([
		'email' => ['required'],
		'password' => ['required']
	]);

	if(Auth::attempt($credentials)) {
	  if(Auth::user()->status != 'active') {
	    
    	    Auth::logout();
	    $request->session()->invalidate();
	    $request->session()->regenerateToken();

	    Session::flash('status', 'failed');
	    Session::flash('message', 'Login gagal | Akun anda belum aktif, silahkan kontak admin!');
	    return redirect('login');

	  } else {
	    $request->session()->regenerate();
	    return redirect('dashboard');
	  }

	}
	Session::flash('status', 'failed');
	Session::flash('message', 'Login gagal | Email atau password yang anda masukkan tidak cocok!');
	return redirect('login');
    }

    public function logout(Request $request)
    {
    	Auth::logout();
	$request->session()->invalidate();
	$request->session()->regenerateToken();
	return redirect()
		->route('login');
    }
}
