@extends('layouts.master')

@section('title', 'Edit Email')

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
						<div class="card-title">Pick role for <b>{{ $user->name  }}</b></div>
                        <a href="{{ route('assign.user.create') }}" class="btn btn-warning btn-sm ml-auto">Back</a>

 					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('assign.user.edit', $user) }}" method="POST">
                            @method('PUT')
                            @csrf
                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="text" class="form-control" name="email" id="user" value="{{ $user->email }}" multiple>
                        </div>
                        <div class="form-group">
                            <label for="role">Pick Role</label>
                            <select name="roles" id="roles" class="form-control select2" multiple> --}}
                                @foreach ($roles as $role)
                                    <option {{ $user->roles()->find($role->id) ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>
                            <button type="submit" class="btn btn-primary btn-sm">Assign</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection
