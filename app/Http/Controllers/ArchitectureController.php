<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Requests;
use App\Models\RequestDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

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

    public function saveformreview(Request $request)
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

        if ($req && $request->hasFile('file')) {

            $file1 = $request->file('file');
            $filename1 = uniqid() . '.' . $file1->getClientOriginalExtension();
            $filePath = $file1->storeAs('document', $filename1, 'public');

            // Simpan ke tabel architecture
            RequestDetail::create([
                'ticket_url' => $request->ticket_url,
                'file' => $filePath,
                'purpose' => $request->purpose,
                'request_id' => $req->id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }

     public function saveformdoc(Request $request)
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

        if ($req) {

            $req_id = $req->id;

            // Simpan ke tabel architecture
            RequestDetail::create([
                'service_name' => $request->service_name,
                'feature' => $request->fitur,
                'purpose' => $request->purpose,
                'request_id' => $req_id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }
}
