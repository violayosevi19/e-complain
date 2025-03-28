<?php

namespace App\Http\Controllers;

use App\Models\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(){
    	return view('ecomplain.Login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
 
        return back()->with('errorLogin','Email or Password Invalid !');
    }

    public function logout(Request $request){
    	Auth::logout();
    	$request->session()->invalidate();
    	$request->session()->regenerateToken();

    	return redirect('/');

    }
}
