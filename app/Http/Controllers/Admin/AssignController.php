<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view ('permission.assign.create', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }



    public function store()
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

       $role =  Role::find(request('role'));
       $role->givePermissionTo(request('permissions'));
       Alert::success('Berhasil', "Data role {$role->name} Berhasil Di Tambahkan");
       return back();
    }



    public function edit(Role $role)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('permission.assign.sync',[
            'role' => $role,
            'roles' => Role::get(),
            'permissions' => Permission::get(),

        ]);
    }



    public function update(Role $role)
    {
        request()->validate([
            'role' => 'required',
            'permissions' => 'array|required',
        ]);

        $role->syncPermissions(request('permissions'));
        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('assign.create');
    }
}
