<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
     public function index() {

        $onprogress = DB::table('requests')->where('status', 'ON PROGRESS')->count();
        $completed = DB::table('requests')->where('status', 'COMPLETED')->count();
        $rejected = DB::table('requests')->where('status', 'REJECTED')->count();
        $waiting = DB::table('requests')->where('status', 'WAITING')->count();

        $requests = DB::table('requests')
                ->select(
                    DB::raw("DATE_FORMAT(request_date, '%Y-%m') as bulan"),
                    'status',
                    DB::raw('COUNT(*) as total')
                )
                ->whereIn('status', ['COMPLETED', 'REJECTED', 'ON PROGRESS', 'WAITING'])
                ->groupBy('bulan', 'status')
                ->orderBy('bulan')
                ->get();

            // Siapkan struktur array bulan & status
            $bulanList = [];
            $statusData = [
                'completed' => [],
                'rejected' => [],
                'onprogress' => [],
                'waiting' => [],
            ];

            // Ambil semua bulan unik
            foreach ($requests as $row) {
                if (!in_array($row->bulan, $bulanList)) {
                    $bulanList[] = $row->bulan;
                }
            }

            // Inisialisasi data 0 terlebih dahulu
            foreach ($bulanList as $bulan) {
                foreach ($statusData as $status => &$arr) {
                    $arr[$bulan] = 0;
                }
            }

            // Masukkan nilai total berdasarkan bulan dan status
            foreach ($requests as $row) {
                $statusData[$row->status][$row->bulan] = $row->total;
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
