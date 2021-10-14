@extends('layouts.master')

@section('title', 'Pick Email')

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
						<div class="card-title">Pick user by email address</div>
 					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('assign.user.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="user">User</label>
                            <input type="text" class="form-control" name="email" id="user" placeholder="contoh@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="roles">Pick Role</label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        @can('edit')
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
						<div class="card-title">Table of Role & permission</div>
 					</div>
				</div>
                <table class="table table-hover">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ implode(', ', $user->getRoleNames()->toArray() )}}</td>
                            <td><a href="{{ route('assign.user.edit', $user) }}"><i class="fas fa-plus-square"></i></a></td>
                        </tr>
                    @endforeach
                </table>
			</div>
		</div>
	</div>
</div>

@endsection
