<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse as Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function login(Request $request): Response
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

		$x = redirect()->intended(route('todo.list'));

        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
			return redirect()->intended(route('todo.list'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }

    public function loginForm(Request $request): View
    {
        return view('pages/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->intended(route('todo.list'));
    }
}
