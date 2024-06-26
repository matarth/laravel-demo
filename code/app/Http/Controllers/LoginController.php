<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	/**
	 * Handle the incoming request.
	 */
	public function login(Request $request)
	{
		$data = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
			return redirect()->intended(route('todo.list'));
		}

		return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
			'email' => 'These credentials do not match our records.',
		]);
	}

	public function loginForm(Request $request)
	{
		return view('pages/login');
	}

	public function logout(Request $request){
		Auth::logout();
		return redirect()->intended(route('todo.list'));
	}
}
