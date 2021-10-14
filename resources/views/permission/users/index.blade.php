@extends('layouts.master')

@section('title', 'Data User')

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
						<div class="card-title">Tabel Data User</div>
                        @can('create')
                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm ml-auto">Create</a>
                        @endcan
 					</div>
				</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Foto</th>
                                <th>Action</th>
                            </tr>

                            @foreach ($users as $index => $user)
                                <tr>
                                    <td>{{ $index + $users->firstItem() }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(', ', $user->getRoleNames()->toArray() )}}</td>
                                    <td>
                                        <img src="{{ asset('storage/'. $user->foto) }}" width="50" height="50"  class="rounded-circle"></td>
                                    <td>
                                        @can('edit')
                                        <a href="{{ route('users.edit', $user->id ) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                        @endcan
                                        {{-- <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                        @can('delete')
                                        <form action="{{ route('users.destroy', $user->id ) }}" class="d-inline-block" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure delete {{ $user->name }}?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
            {{ $users->links() }}

                </div>
			</div>
		</div>
	</div>
</div>

@endsection





