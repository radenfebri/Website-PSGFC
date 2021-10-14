<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $roles = Role::get();
        $role = new Role;
        return view('permission.roles.index', compact('roles', 'role'));
    }


    public function store()
    {
        request()->validate([
            'name' => 'required',

        ]);

        Role::create([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return back();
    }


    public function edit(Role $role)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('permission.roles.edit', [
            'role' => $role,
            'submit' => 'Update'
        ]);
    }


    public function update(Role $role)
    {
        request()->validate([
            'name' => 'required',
        ]);

        $role->update([
            'name' => request('name'),
            'guard_name' => request('guard_name') ?? 'web',
        ]);

        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('roles.index');
    }
}
