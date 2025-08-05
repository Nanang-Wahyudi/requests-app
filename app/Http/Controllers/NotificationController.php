<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requests;

class NotificationController extends Controller
{
    public function fetch()
    {
        $notifications = Requests::where('is_read', false)->limit(5)->get();
        return view('partials.notification', compact('notifications'));
    }

    public function markAllAsRead()
    {
        Requests::where('is_read', false)->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Semua notifikasi telah dibaca.');
    }
}
