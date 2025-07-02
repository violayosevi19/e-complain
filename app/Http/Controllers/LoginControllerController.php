<?php

namespace App\Http\Controllers;

use App\Models\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register()
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('ecomplain.register', ['hideActions' => $hideActions,]);
    }



    public function registerProcess(Request $request)
    {
        // Validasi inputr

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'jenisuser_id' => ['required', 'string']
        ]);

        // Simpan user baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'jenisuser_id' => $validatedData['jenisuser_id']
        ]);

        // (Opsional) Auto login user
        Auth::login($user);

        return redirect('/home')->with('success', 'Register berhasil!');
    }


    public function login()
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('ecomplain.Login', ['hideActions' => $hideActions,]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/home');
        }

        return back()->with('errorLogin', 'Email or Password Invalid !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
