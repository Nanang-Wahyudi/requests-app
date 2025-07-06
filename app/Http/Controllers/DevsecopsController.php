<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DevsecopsController extends Controller
{
    public function formsecscan()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('devsecops.formsecscan', [
            'title' => "Form Security Scan",
            'reqtypes' => $reqtypes
        ]);
    }

    public function formprodmerge()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('devsecops.formprodmerge', [
            'title' => "Form Production Merge",
            'reqtypes' => $reqtypes
        ]);
    }
}
