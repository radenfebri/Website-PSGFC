@extends('layouts.master')

@section('title', 'Iklan')

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
						<div class="card-title">Iklan</div>
                        @can('create')
                        <a href="{{ route('iklan.create') }}" class="btn btn-primary btn-sm ml-auto">Ceate</a>
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
                                <th>Judul Iklan</th>
                                <th>Link</th>
                                <th>Status</th>
                                <th>Gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($iklans as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->judul }}</td>
                                <td>{{ $row->link }}</td>
                                <td>
                                    @if ($row->status == '1')
                                        Publish
                                        @else
                                        Draft
                                    @endif
                                </td>
                                <td><img src="{{ asset('storage/'. $row->gambar_iklan) }}" width="100"></td>
                                <td>
                                    @can('edit')
                                    <a href="{{ route('iklan.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-pen"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Masih Kosong</td>
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
