<?php

namespace App\Http\Controllers;
use App\Models\complain;


use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporan()
    {
       
        return view('report.datacomplain',[
            'datas'=>complain::All(),
        ]);
    }
}
