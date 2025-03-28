<?php

namespace App\Http\Controllers;

use App\Models\JenisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAsController extends Controller
{


    public function index()
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();

        return view('layout.LoginAs', [
            'level' => $jenisUser,
        ]);
    }

    public function authenticate(Request $request)
    {
        $selectedRole = $request->input('name');

        if ($selectedRole === 'Pasien') {
            session()->put('jenisusers', 'Pasien');
            return redirect('/home');
        } else {
            return redirect()->route('ecomplain.login');
        }
    }

}
