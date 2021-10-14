<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $permissions = Permission::orderBy('created_at','DESC')->paginate(5);
        $permission = new Permission;
        return view('permission.permissions.index', compact('permissions', 'permission'));
    }


    public function store()
    {
        request()->validate([
            'name' => 'required',

        ]);

        Permission::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return back();
    }


    public function edit(Permission $permission)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('permission.permissions.edit', [
            'permission' => $permission,
            'submit' => 'Update'
        ]);
    }


    public function update(Permission $permission)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $permission->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);
        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('permissions.index');
    }

    public function destroy($permission)
    {
        //
    }
}
