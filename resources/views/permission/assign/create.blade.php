@extends('layouts.master')

@section('title', 'Assign Permission')

@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="panel-header bg-primary-gradient">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
			<div>

			</div>
			<div class="ml-md-auto py-2 py-md-0">
			</div>
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Assign Permission</div>
 					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('assign.create') }}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="role">Role Name</label>
                                <select name="role" id="role" class="form-control">
                                    <option disabled selected>Choose a role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                @error('role')
                                    <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- <div class="responsive"> --}}
                                <div class="form-group">
                                    <label for="permissions">Permissions</label>
                                        <select name="permissions[]" id="permissions" class="form-control select2" multiple="multiple>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('permissions')
                                        <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                        @enderror
                                </div>
                            {{-- </div> --}}
                                @can('create')
                                <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                                @endcan
                        </form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
                <div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Tabel Role</div>
 					</div>
				</div>
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Guard Name</th>
                        <th>Permissions</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($roles as $index => $role)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->guard_name }}</td>
                            <td>{{ implode(', ', $role->getPermissionNames()->toArray() )}}</td>
                            @can('edit')
                            <td>
                                <a href="{{ route('assign.edit', $role) }}"><i class="fas fa-plus-square"></i></a>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
			</div>
		</div>
	</div>
</div>

@endsection


