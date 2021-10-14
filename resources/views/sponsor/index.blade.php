@extends('layouts.master')

@section('title', 'Sponsor')

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
            <div class="card">
                <div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Sponsor</div>
                        @can('create')
                        <a href="{{ route('sponsor.create') }}" class="btn btn-primary btn-sm ml-auto">Ceate</a>
                        @endcan
 					</div>
				</div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session('success') }}
                        </div>
                    @endif
					<div class="table-responsive">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Gambar Sponsor</th>
                                <th>Link Sponsor</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sponsors as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><img src="{{ asset('storage/'. $row->logo) }}" width="100"></td>
                                <td>{{ $row->link }}</td>
                                <td>
                                    @can('edit')
                                    <a href="{{ route('sponsor.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-pen"></i>
                                    </a>
                                    @endcan

                                    @can('delete')
                                    <form action="{{ route('sponsor.destroy',$row->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Data Masih Kosong</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
					</div>

				</div>
            </div>
        </div>
</div>


@endsection
