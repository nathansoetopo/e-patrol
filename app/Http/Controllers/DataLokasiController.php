<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DataLokasiController extends Controller
{
    public function dataLokasiAdmin()
    {
        return view('pages.admin.SuperAdmin-Datalokasi');
    }

    public function dataLokasiHRD()
    {
        return view('pages.hrd.HR-DataLokasi');
    }
}
