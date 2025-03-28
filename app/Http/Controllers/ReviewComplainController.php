<?php

namespace App\Http\Controllers;

use App\Models\ReviewComplain;
use App\Models\JenisUser;
use App\Models\complain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('ecomplain.reviewcomplain',[
            'reviewcomplain'=>complain::All(),
            'level' => $jenisUser,
            'hideActions' => $hideActions
        ]);
    }

    public function create()
    {
         return view('dashboard.mahasiswa.create',['jurusans' => Jurusan::all() ]);
    }

    
    public function store(Request $request)
    {
       

    }

  
    public function show(ReviewComplain  $reviewcomplain)
    {
        
    }

  
    public function edit(ReviewComplain $reviewcomplain,$id)
    {
        $jenisUser = JenisUser::pluck('jenisuser')->toArray();
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('ecomplain.formtanggapan', [
            // 'complains' => Complain::find($reviewcomplain->id)
            'complains' => Complain::find($id),
             'hideActions' => $hideActions
            // 'mahasiswas' => Mahasiswa::find($mahasiswa->id);
        ]);
    }

   
    public function update(Request $request, ReviewComplain $reviewcomplain,$id)
    {
        $validateData = $request->validate([
            'tanggapan' => 'required'
        ]);

        Complain::where('id',$id)->update($validateData);
        return redirect('/review-complain')->with('pesan','Data berhasil diubah');
    }

    public function destroy(ReviewComplain $reviewComplain)
    {
      
    }
}
