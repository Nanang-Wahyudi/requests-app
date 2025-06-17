<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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
            ->join('requesttypes', 'requesttypes.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.id', 'users.name', 'requesttypes.request_type_name', 'requests.request_date', 'requests.pic', 'requests.collect_date', 'requests.status', 'requests.complated_date')
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
}
