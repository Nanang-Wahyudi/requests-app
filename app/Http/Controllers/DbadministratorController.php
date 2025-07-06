<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbadministratorController extends Controller
{
    public function formqueryexec()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('dbadministrator.formqueryexec', [
            'title' => "Form Query Exec",
            'reqtypes' => $reqtypes
        ]);
    }

    public function formdataretrieval()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('dbadministrator.formdataretrieval', [
            'title' => "Form Data Retrieval",
            'reqtypes' => $reqtypes
        ]);
    }
}
