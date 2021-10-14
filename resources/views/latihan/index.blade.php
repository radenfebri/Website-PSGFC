@extends('layouts.master')

@section('title', 'Jadwal Latihan')

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
						<div class="card-title">Jadwal Latihan</div>
                        @can('create')
                        <a href="{{ route('latihan.create') }}" class="btn btn-primary btn-sm ml-auto">Ceate</a>
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
                                <th>Tempat</th>
                                <th>Tanggal dan Waktu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latihans as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row->tempat }}</td>
                                <td>{{date('d M Y H:i',strtotime($row->tanggal_waktu))}}</td>
                                <td>
                                    @can('edit')
                                    <a href="{{ route('latihan.edit', $row->id) }}"
                                        class="btn btn-warning btn-sm"><i class="fas fa-pen"></i>
                                    </a>
                                    @endcan

                                    @can('delete')
                                    <form action="{{ route('latihan.destroy',$row->id) }}" method="POST" class="d-inline">
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
                {{ $latihans->links() }}
				</div>
            </div>
        </div>
</div>


@endsection
