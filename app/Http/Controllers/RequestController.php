<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;

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

    public function agentreqavailable(Request $request)
    {
        $userRoles = auth()->user()->roles()->pluck('id')->toArray();

        // dd($userRoles);

         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.*', 'request_types.request_type_name', 'users.name')
            ->where('request_types.role_id', $userRoles)
            ->where('requests.status', 'waiting')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/agent-request-available/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>
                                <a href='/agent-request-available/$row->id/asign' class='btn btn-success btn-sm'>Assign To Me</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('request.agentreqavailable', [
            'title' => "Agent Requests Available"
        ]);
    }

     public function agentreqonprogress(Request $request)
    {
        $userpic = auth()->user()->name;

        // dd($userRoles);

         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.*', 'request_types.request_type_name', 'users.name')
            ->where('requests.pic', $userpic)
            ->where('requests.status', 'onprogress')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/agent-request-available/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>
                                <a href='/agent-request-available/$row->id/complated' class='btn btn-success btn-sm'>Completed Request</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('request.agentreqonprogress', [
            'title' => "Agent Requests Onprogress"
        ]);
    }

    public function agentreqcomplated(Request $request)
    {
        $userpic = auth()->user()->name;

        // dd($userRoles);

         if ($request->ajax()) {
            $data = DB::table('requests')
            ->join('request_types', 'request_types.id', '=', 'requests.request_type_id')
            ->join('users', 'users.id', '=', 'requests.user_id')
            ->select('requests.*', 'request_types.request_type_name', 'users.name')
            ->where('requests.pic', $userpic)
            ->where('requests.status', 'complated')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return "<a href='/agent-request-available/$row->id/detail' class='btn btn-primary btn-sm'>Detail</a>";
                    })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('request.agentreqcomplated', [
            'title' => "Agent Requests Complated"
        ]);
    }

    public function agentasignreq($id)
    {
        $userpic = auth()->user()->name;
         $tgl = Carbon::now();
        $tgl_now = $tgl->format('Y-m-d');
        DB::table('requests')
            ->where('id', $id)
            ->update([
                'collect_date' => $tgl_now,
                'pic' => $userpic,
                'status' => 'onprogress'
            ]);

        return redirect('agent-request-onprogress')->with('success', 'Request Berhasil diambil.');
    }
}
