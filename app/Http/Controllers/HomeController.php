<?php

namespace App\Http\Controllers;

use App\Models\complain;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Models\jeniscomplain;
use App\Models\JenisUser;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        $notifications = Complain::where('is_read', false)->orderBy('created_at', 'desc')->take(5)->get();
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();

        // dd($hideActions);
        return view('ecomplain.dashboard', [
            'notifications' => $notifications,
            'dashboard' => jeniscomplain::All(),
            'hideActions' => $hideActions,
            'reviewcomplain' => complain::All(),
            'jeniscomplains' => jeniscomplain::All(),
        ]);
    }
}
