<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Models\jeniscomplain;
use App\Models\JenisUser;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   
    public function index()
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('ecomplain.dashboard',[
            'dashboard'=>jeniscomplain::All(),
            'hideActions' => $hideActions
        ]);
    }
}
