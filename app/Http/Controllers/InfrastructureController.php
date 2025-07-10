<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Infrastructure;
use App\Models\Requests;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

class InfrastructureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('infrastructures', 'infrastructures.request_id', '=', 'requests.id')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.id', 'users.name', 'request_types.request_type_name', 'requests.request_date', 'requests.pic', 'requests.collect_date', 'requests.status', 'requests.complated_date')
            ->where('requests.status', 'complated')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return '<a href="' . route('infratructure-complated.show', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('infrastructure.index', [
            'title' => "Infrastructure"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function formspecup()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('infrastructure.formspecup', [
            'title' => "Form Spec Upgrade",
            'reqtypes' => $reqtypes
        ]);
    }

    public function formsoftinstall()
    {
        $reqtypes = DB::table('request_types')->get();
        return view('infrastructure.formsoftinstall', [
            'title' => "Form Soft Install",
            'reqtypes' => $reqtypes
        ]);
    }

    public function saveformspec(Request $request)
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

         if($req){
            // $last_id = Requests::latest()->first();
            $req_id = $req->id;

                Infrastructure::create([
                    'ticket_url' => $request->ticket_url,
                    'server_name' => $request->server_name,
                    'current_spec' => $request->current_spec,
                    'requested_spec' => $request->requested_spec,
                    'purpose' => $request->purpose,
                    'request_id' => $req_id
                ]);
         }

         return redirect('developer-request-onprogress')->with('success', 'Data berhasil dibuat.');
    }
}
