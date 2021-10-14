@extends('layouts.master')

@section('title', 'Sync Assign Permission')

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
                        <a href="{{ route('assign.create') }}" class="btn btn-warning btn-sm ml-auto">Back</a>

 					</div>
				</div>
                <div class="card-body">
                    <form action="{{ route('assign.edit', $role ) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="role">Role Name</label>
                            <select name="role" id="role" class="form-control">
                                <option disabled selected>Choose a role</option>
                                    @foreach ($roles as $item)
                                        <option {{ $role->id == $item->id ? 'selected' : ''}} value="{{ $item->id }}">{{ $role->name }}</option>
                                    @endforeach
                            </select>
                            @error('role')
                                <div class="text-danger mt-2 d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="permissions">Permissions</label>
                                <select name="permissions[]" id="permissions" class="form-control select2" multiple>
                                    @foreach ($permissions as $permission)
                                        <option {{ $role->permissions()->find($permission->id) ? 'selected' : '' }}
                                            value="{{ $permission->id }}">{{ $permission->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('permissions')
                                <div class="text-danger mt-2 d-block">{{ $message }}</div>
                                @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Sync</button>
                    </form>
                </div>
			</div>
		</div>
	</div>
</div>


@endsection
