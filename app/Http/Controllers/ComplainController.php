<?php

namespace App\Http\Controllers;

use App\Models\complain;
use App\Models\jeniscomplain;
use App\Models\JenisUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplainController extends Controller
{
   
    public function index()
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien',$jenisUser) && !Auth::check();
        return view('ecomplain.ecomplain',[
            'jeniscomplains'=>jeniscomplain::All(),
            'hideActions' => $hideActions,
        ]);
    }

   
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'jeniscomplain_id' => 'required',
            'complain' => 'required'
        ]);

        complain::create($validateData);
        return redirect('/ecomplain')->with('pesan','Complain berhasil ditambahkan');
    }

    
    public function destroy(complain $complain,$id)
    {
         
    }
}
