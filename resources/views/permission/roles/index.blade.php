@extends('layouts.master')

@section('title', 'Role')

@section('content')

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
						<div class="card-title">Create new Role</div>
 					</div>
				</div>
				<div class="card-body">
                    <form action="{{ route('roles.create') }}" method="POST">
                        @csrf
                        @can('create')
                            @include('permission.roles.partials.form-control',['submit' => 'Create'])
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Guard Name</th>
                                    <th>Create At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $index => $role)
                                <tr>
                                    <td>{{ $index + 1  }}</td>
                                    <td>{{ $role->name  }}</td>
                                    <td>{{ $role->guard_name  }}</td>
                                    <td>{{ $role->created_at->format('d F Y')  }}</td>
                                    @can('edit')
                                    <td>
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                        </div>
                </div>
			</div>
		</div>
	</div>
</div>

@endsection
