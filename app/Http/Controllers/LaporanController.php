<?php

namespace App\Http\Controllers;

use App\Models\complain;
use App\Models\JenisUser;
use App\Models\jeniscomplain;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan(Request $request)
    {
        $datas = Complain::orderBy('created_at', 'desc')->get(); // Ambil semua dulu
        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir') && $request->filled('jenis_complain')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return
                    $item->jeniscomplain_id == $request->jenis_complain &&
                    $item->created_at >= $request->tanggal_awal &&
                    $item->created_at <= \Carbon\Carbon::parse($request->tanggal_akhir)->endOfDay();
            });
        } elseif ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return
                    $item->created_at >= $request->tanggal_awal &&
                    $item->created_at <= \Carbon\Carbon::parse($request->tanggal_akhir)->endOfDay();
            });
        } elseif ($request->filled('tanggal_awal')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return
                    $item->created_at >= $request->tanggal_awal &&
                    $item->created_at < \Carbon\Carbon::parse($request->tanggal_awal)->addDay();
            });
        } elseif ($request->filled('jenis_complain')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return $item->jeniscomplain_id == $request->jenis_complain;
            });
        }


        $notifications = Complain::where('is_read', false)->orderBy('created_at', 'desc')->take(5)->get();
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('report.index', [
            'datas' => $datas,
            'notifications' => $notifications,
            'reviewcomplain' => $datas,
            'level' => $jenisUser,
            'hideActions' => $hideActions,
            'jeniscomplains' => jeniscomplain::All(),
        ]);
    }

    // public function downloadLaporan()
    // {
    //     $datas = complain::orderBy('created_at', 'desc')->get();
    //     return view('report.datacomplain', [
    //         'datas' => $datas,
    //     ]);
    // }

    public function downloadLaporan(Request $request)
    {
        $userId = auth()->user()->id;
        $userRole = auth()->user()->jenisuser_id;
        if ($userId && $userRole === 'Pasien') {
            $datas = Complain::where('user_id', $userId)->orderBy('created_at', 'desc')->get();
        } else {
            $datas = Complain::orderBy('created_at', 'desc')->get();
        }

        if ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir') && $request->filled('jenis_complain')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return
                $item->jeniscomplain_id == $request->jenis_complain &&
                    $item->created_at >= $request->tanggal_awal &&
                    $item->created_at <= \Carbon\Carbon::parse($request->tanggal_akhir)->endOfDay();
            });
        } elseif ($request->filled('tanggal_awal') && $request->filled('tanggal_akhir')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return
                    $item->created_at >= $request->tanggal_awal &&
                    $item->created_at <= \Carbon\Carbon::parse($request->tanggal_akhir)->endOfDay();
            });
        } elseif ($request->filled('tanggal_awal')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return
                    $item->created_at >= $request->tanggal_awal &&
                    $item->created_at < \Carbon\Carbon::parse($request->tanggal_awal)->addDay();
            });
        } elseif ($request->filled('jenis_complain')) {
            $datas = $datas->filter(function ($item) use ($request) {
                return $item->jeniscomplain_id == $request->jenis_complain;
            });
        }

        return view('report.datacomplain', [
            'datas' => $datas,
        ]);
    }
}
