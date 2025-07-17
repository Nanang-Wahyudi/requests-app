<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Requests;
use App\Models\Network;
use Carbon\Carbon;

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

    public function saveformipaddress(Request $request)
    {
         $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $user_id = auth()->user()->id;

        $req = Requests::create([
            'request_date' => $tgl_now,
            'status' => 'WAITING',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

         if($req){
            // $last_id = Requests::latest()->first();
            $req_id = $req->id;

                Network::create([
                    'ticket_url' => $request->ticket_url,
                    'server_name' => $request->server_name,
                    'purpose' => $request->purpose,
                    'request_id' => $req_id
                ]);
         }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }

    public function saveformfirewall(Request $request)
    {
         $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $user_id = auth()->user()->id;

        $req = Requests::create([
            'request_date' => $tgl_now,
            'status' => 'WAITING',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

         if($req){
            // $last_id = Requests::latest()->first();
            $req_id = $req->id;

                Network::create([
                    'ticket_url' => $request->ticket_url,
                    'source_ip' => $request->source_ip,
                    'destination_ip' => $request->destination_ip,
                    'port' => $request->port,
                    'purpose' => $request->purpose,
                    'request_id' => $req_id
                ]);
         }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }
}
