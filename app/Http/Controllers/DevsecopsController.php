<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Requests;
use App\Models\RequestDetail;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class DevsecopsController extends Controller
{
     public function reqcompleted(Request $request)
    {
         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('roles', 'roles.id', '=', 'request_types.role_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.*', 'users.name', 'request_types.request_type_name')
            ->where('roles.name', 'DevSecOps')
            ->whereIn('requests.status', ['COMPLETED', 'REJECTED'])
            ->orderBy('requests.id', 'desc')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/devsecops-completed/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('devsecops.reqcompleted', [
            'title' => "DevSecOps Completed"
        ]);
    }

    public function reqonprogress(Request $request)
    {
         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('roles', 'roles.id', '=', 'request_types.role_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.*', 'users.name', 'request_types.request_type_name')
            ->where('roles.name', 'DevSecOps')
            ->where('requests.status', 'ON PROGRESS')
            ->orderBy('requests.id', 'desc')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/devsecops-onprogress/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('devsecops.reqonprogress', [
            'title' => "DevSecOps On Progress"
        ]);
    }

    public function reqavailable(Request $request)
    {
         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('roles', 'roles.id', '=', 'request_types.role_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.*', 'users.name', 'request_types.request_type_name')
            ->where('roles.name', 'DevSecOps')
            ->where('requests.status', 'WAITING')
            ->orderBy('requests.id', 'desc')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/devsecops-available/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('devsecops.reqavailable', [
            'title' => "DevSecOps Available"
        ]);
    }

    public function detailonprogress($id)
    {
        $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->join('users as pic_users', 'pic_users.name', '=', 'requests.pic')
            ->join('request_details', 'requests.id', '=', 'request_details.request_id')
            ->select('request_details.*', 
                    'request_types.request_type_name', 
                    'requests.status', 
                    'requests.request_date', 
                    'requests.collect_date',
                    'users.name', 
                    'users.email', 
                    'pic_users.name as pic_name',
                    'pic_users.email as pic_email')
            ->where('request_details.request_id', $id)
            ->first();

        return view('devsecops.detailonprogress', [
            'title' => "Detail Request On Progress",
            'data' => $data
        ]);
    }

    public function detailavailable($id)
    {
        $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->join('request_details', 'requests.id', '=', 'request_details.request_id')
            ->select('request_details.*', 
                    'request_types.request_type_name', 
                    'requests.status', 
                    'requests.request_date', 
                    'users.name', 
                    'users.email')
            ->where('request_details.request_id', $id)
            ->first();
            
        return view('devsecops.detailavailable', [
            'title' => "Detail Request Available",
            'data' => $data
        ]);
    }

    public function detailcompleted($id)
    {
        $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->join('users as pic_users', 'pic_users.name', '=', 'requests.pic')
            ->join('request_details', 'requests.id', '=', 'request_details.request_id')
            ->select('request_details.*', 
                    'request_types.request_type_name', 
                    'requests.status', 
                    'requests.request_date', 
                    'requests.collect_date',
                    'requests.complated_date', 
                    'requests.result', 
                    'requests.result_file',
                    'requests.note',  
                    'users.name', 
                    'users.email', 
                    'pic_users.name as pic_name',
                    'pic_users.email as pic_email')
            ->where('request_details.request_id', $id)
            ->first();

        return view('devsecops.detailcompleted', [
            'title' => "Detail Request Completed",
            'data' => $data
        ]);
    }

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
            'status' => 'WAITING',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

        if ($req) {

            $req_id = $req->id;

            // Simpan ke tabel architecture
            RequestDetail::create([
                'ticket_url' => $request->ticket_url,
                'scan_type' => $request->scan_type,
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
            'status' => 'WAITING',
            'user_id' => $user_id,
            'request_type_id' => $request->req_id
        ]);

        if ($req) {

            $req_id = $req->id;

            // Simpan ke tabel architecture
            RequestDetail::create([
                'ticket_url' => $request->ticket_url,
                'pr_url' => $request->pr_url,
                'purpose' => $request->purpose,
                'request_id' => $req_id,
            ]);
        }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }
}
