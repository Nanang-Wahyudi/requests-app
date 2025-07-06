<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NetworkController extends Controller
{
     public function formaddressip()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('network.formaddressip', [
            'title' => "Form IP Address Allocation",
            'reqtypes' => $reqtypes
        ]);
    }

     public function formfirewallaccess()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('network.formfirewallaccess', [
            'title' => "Form Firewall Access",
            'reqtypes' => $reqtypes
        ]);
    }
}
