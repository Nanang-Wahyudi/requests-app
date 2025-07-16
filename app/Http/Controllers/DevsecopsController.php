<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Requests;
use App\Models\Devsecop;
use Carbon\Carbon;

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

    public function saveformsecscan(Request $request)
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
            Devsecop::create([
                'ticket_url' => $request->ticket_url,
                'type_scan' => $request->type_scan,
                'repository_url' => $request->repository_url,
                'branch_name' => $request->branch_name,
                'purpose' => $request->purpose,
                'request_id' => $req_id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }

    public function saveformprodmerge(Request $request)
    {
        $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        $user_id = auth()->user()->id;

        $req = Requests::create([
            'request_date' => $tgl_now,
            'status' => 'waiting',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

        if ($req) {

            $req_id = $req->id;

            // Simpan ke tabel architecture
            Devsecop::create([
                'ticket_url' => $request->ticket_url,
                'pr_url' => $request->pr_url,
                'purpose' => $request->purpose,
                'request_id' => $req_id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }
}
