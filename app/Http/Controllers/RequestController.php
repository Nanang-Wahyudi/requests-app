<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RequestController extends Controller
{
     public function reqcomplated(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->select('requests.*', 'request_types.request_type_name')
            ->where('requests.user_id', auth()->id())
            ->where('requests.status', 'completed')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/developer-request-complated/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('request.reqcomplated', [
            'title' => "Request Complate"
        ]);
    }

     public function reqonprogress(Request $request)
    {
          if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->select('requests.*', 'request_types.request_type_name')
            ->where('requests.user_id', auth()->id())
            ->where('requests.status', 'onprogress')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/developer-request-onprogress/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('request.reqonprogress', [
            'title' => "Request on progress"
        ]);
    }
}
