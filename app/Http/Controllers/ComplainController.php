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
        $hideActions = in_array('Pasien', $jenisUser) && !Auth::check();
        return view('ecomplain.ecomplain', [
            'jeniscomplains' => jeniscomplain::All(),
            'hideActions' => $hideActions,
        ]);
    }


    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'jeniscomplain_id' => 'required',
            'complain' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);

        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('complain-files', 'public');
            $validateData['image'] = $filePath;
        }


        complain::create($validateData);
        return redirect('/home')->with('pesan', 'Complain berhasil ditambahkan');
    }


    public function destroy(complain $complain, $id) {}
}
