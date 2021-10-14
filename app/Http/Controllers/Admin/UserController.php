<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        abort_if(Gate::denies('create'), Response::HTTP_FORBIDDEN, 'Forbidden');

        $roles = Role::get();
        $users = User::has('roles')->get();
        return view('permission.assign.user.create', compact('roles', 'users'));
    }



    public function store()
    {
        $user = User::where('email', request('email'))->first();
        $user->assignRole(request('roles'));
        Alert::success('Berhasil', 'Data Berhasil Di Tambahkan');
        return back();
    }


    public function edit(User $user)
    {
        abort_if(Gate::denies('edit'), Response::HTTP_FORBIDDEN, 'Forbidden');

        return view('permission.assign.user.edit', [
            'user' => $user,
            'roles' => Role::get(),
            'users' => User::has('roles')->get(),
        ]);
    }


    public function update(User $user)
    {
        $user->syncRoles(request('roles'));
        Alert::info('Berhasil', 'Data Berhasil Di Update');
        return redirect()->route('assign.user.create');
    }
}
