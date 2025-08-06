<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Requests;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles()->pluck('name');

        $query = DB::table('requests')
            ->join('request_types', 'requests.request_type_id', '=', 'request_types.id')
            ->join('roles', 'request_types.role_id', '=', 'roles.id');

        if ($roles->contains('Manager IT')) {

        } elseif ($roles->contains('Developer')) {
            $query->where('user_id', $user->id);
            
        } else {
            $query->where(function ($q) use ($user, $roles) {
                $q->where(function ($subQ) use ($roles) {
                    $subQ->where('requests.status', 'WAITING')
                        ->whereIn('roles.name', $roles);
                })->orWhere(function ($subQ) use ($user) {
                    $subQ->where('requests.status', '!=', 'WAITING')
                        ->where('requests.pic', $user->name);
                });
            });
        }

        $onprogress = (clone $query)->where('status', 'ON PROGRESS')->count();
        $completed = (clone $query)->where('status', 'COMPLETED')->count();
        $rejected  = (clone $query)->where('status', 'REJECTED')->count();
        $waiting   = (clone $query)->where('status', 'WAITING')->count();

        $chartQuery = (clone $query)
            ->select(
                DB::raw("DATE_FORMAT(request_date, '%Y-%m') as bulan"),
                DB::raw("LOWER(status) as status"),
                DB::raw('COUNT(*) as total')
            )
            ->whereIn('status', ['COMPLETED', 'REJECTED', 'ON PROGRESS', 'WAITING'])
            ->groupBy('bulan', 'status')
            ->orderBy('bulan')
            ->get();

        $bulanList = [];
        $statusData = [
            'completed' => [],
            'rejected' => [],
            'onprogress' => [],
            'waiting' => [],
        ];

        foreach ($chartQuery as $row) {
            if (!in_array($row->bulan, $bulanList)) {
                $bulanList[] = $row->bulan;
            }
        }

        foreach ($bulanList as $bulan) {
            foreach ($statusData as $status => &$arr) {
                $arr[$bulan] = 0;
            }
        }

        foreach ($chartQuery as $row) {
            $status = strtolower(str_replace(' ', '', $row->status));
            if (isset($statusData[$status][$row->bulan])) {
                $statusData[$status][$row->bulan] = $row->total;
            }
        }

        return view('home', [
            'title' => 'Dashboard',
            'onprogress' => $onprogress,
            'completed' => $completed,
            'rejected' => $rejected,
            'waiting' => $waiting,
            'bulanList' => $bulanList,
            'statusData' => $statusData
        ]);
    }
}