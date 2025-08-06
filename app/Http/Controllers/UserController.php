<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Mail\SendAccountDetailsMail;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = User::with('roles');

          return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('roles', function ($user) {
                return $user->getRoleNames()->join(', ');
            })
            ->addColumn('action', function ($row) {
                $roleName = $row->roles->first()->name ?? '';
                return '<button class="btn btn-warning btn-sm edit-role-btn"
                            data-id="' . $row->id . '"
                            data-role="' . $roleName . '">Ubah Role</button>
                        <a href="' . route('users.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>';
            })
            ->rawColumns(['action'])
            ->make(true);

        }
        return view('user.index', [
                'title' => "User",
                 'roles' => Role::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $roles = Role::all();
         return view('user.create', [
            'title' => "Create User",
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|exists:roles,name',
         ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role);

         Mail::to($user->email)->send(new SendAccountDetailsMail($user->email, $request->password));

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
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
    public function edit(User $user)
    {
        $roles = Role::all();
        $userRole = $user->roles->pluck('name')->first();

        return view('user.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|exists:roles,name',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,name',
        ]);

        $user->syncRoles([$request->role]);

        return response()->json(['message' => 'Role berhasil diperbarui.']);
    }

    public function formchangepassword()
    {
         return view('user.formchangepassword', [
            'title' => "Form Change Password"
        ]);
    }

    public function processchangepassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'], // pastikan ada konfirmasi jika diperlukan
        ]);

        $user = Auth::user();

        // Cek apakah current password cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.'])->withInput();
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diperbarui.');
    }
}
