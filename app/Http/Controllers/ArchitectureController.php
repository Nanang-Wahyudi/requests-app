<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchitectureController extends Controller
{
     public function formreviewarch()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('architecture.formreviewarch', [
            'title' => "Form Review Architecture",
            'reqtypes' => $reqtypes
        ]);
    }

     public function formdocarch()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('architecture.formdocarch', [
            'title' => "Form Doc Arch",
            'reqtypes' => $reqtypes
        ]);
    }
}
