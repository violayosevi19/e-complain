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
        $hideActions = true; // default sembunyi form
        $review_complain = complain::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        $hasPendingTanggapan = $review_complain->contains(function ($complain) {
            return $complain->tanggapan === null; // adjust sesuai field kamu
        });
        if (Auth::check()) {
            // Misal kolom role langsung di users
            $role = auth()->user()->jenisuser_id;

            // Kalau role = Pasien => hide, kalau selain Pasien => show
            $hideActions = $role === 'Pasien';
        }

        return view('ecomplain.dashboard', [
            'notifications' => $notifications,
            'dashboard' => jeniscomplain::All(),
            'hideActions' => $hideActions,
            'reviewcomplain' => $review_complain,
            'jeniscomplains' => jeniscomplain::All(),
            'hasPending' => $hasPendingTanggapan
        ]);
    }
}
