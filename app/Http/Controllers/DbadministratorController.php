<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Requests;
use App\Models\Dbadministrator;
use Carbon\Carbon;

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

     public function saveformqueryex(Request $request)
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $user_id = auth()->user()->id;

        $req = Requests::create([
            'request_date' => $tgl_now,
            'status' => 'onprogress',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

        if ($req) {

            $req_id = $req->id;

            // Simpan ke tabel architecture
            Dbadministrator::create([
                'ticket_url' => $request->ticket_url,
                'database_name' => $request->database_name,
                'query' => $request->querie,
                'purpose' => $request->purpose,
                'request_id' => $req_id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }

      public function saveformdataret(Request $request)
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $user_id = auth()->user()->id;

        $req = Requests::create([
            'request_date' => $tgl_now,
            'status' => 'onprogress',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

        if ($req) {

            $req_id = $req->id;

            // Simpan ke tabel architecture
            Dbadministrator::create([
                'ticket_url' => $request->ticket_url,
                'database_name' => $request->database_name,
                'description' => $request->description,
                'purpose' => $request->purpose,
                'request_id' => $req_id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }
}
