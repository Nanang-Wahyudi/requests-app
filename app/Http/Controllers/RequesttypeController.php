<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requesttype;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RequesttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         if ($request->ajax()) {
            $data = DB::table('request_types')
            ->join('roles', 'request_types.role_id', '=', 'roles.id')
            ->select('request_types.*', 'roles.name')
            ->get();

            return DataTables::of($data)
                    ->addIndexColumn()
                    // ->addColumn('action', function ($row) {
                    //     return '<a href="' . route('requesttypes.edit', $row->id) . '" class="btn btn-primary btn-sm">Edit</a>
                    //             <button class="btn btn-sm btn-danger delete-btn" data-id="'.$row->id.'">Delete</button>';
                    // })
                    ->rawColumns(['action'])
                    ->make(true);
                    }

        return view('requesttype.index', [
            'title' => "Request Type"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('requesttype.create', [
            'title' => "Create Request Type",
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'request_type_name' => 'required|string|max:255',
            'role_id' => 'required|integer',
        ]);

        Requesttype::create($validate);

        return redirect()->route('requesttypes.index')->with('success', 'Request Type berhasil dibuat.');
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
    public function edit($id)
    {
        $reqtype = Requesttype::findOrFail($id);
        $roles = Role::all();
        return view('requesttype.edit', [
            'title' => "Update Role",
            'reqtype' => $reqtype,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validate = $request->validate([
            'request_type_name' => 'required|string|max:255',
            'role_id' => 'required|integer',
        ]);

        // Simpan data ke database
        $reqtype = Requesttype::findOrFail($id);
        $reqtype->update($validate);

        // Redirect dengan pesan sukses
        return redirect()->route('requesttypes.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $reqtype = Requesttype::findOrFail($id);

        if($reqtype->delete()){
            $response['success'] = 1;
            $response['msg'] = 'Delete successfully';
        }else{
            $response['success'] = 0;
            $response['msg'] = 'Invalid ID.';
        }

        return response()->json($response);
    }
}
