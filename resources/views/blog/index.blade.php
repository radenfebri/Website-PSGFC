@extends('layouts.master')

@section('title', 'Blog')

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
                        <div class="card-title">Blog Site</div>
                        @can('create')
                        <a href="{{ route('blog.create') }}" class="btn btn-primary btn-sm ml-auto">Ceate</a>
                        @endcan
                    </div>
                </div>
                {{-- <div class="row align-item-right">
                    <div class="card-title">
                        <form action="{{ route('blog.index') }}">
                            <input type="text" id="search" name="search" onkeyup="myFunction()" value="{{ request('search') }}" placeholder="Search..">
                        </form>
                    </div>
                </div> --}}

                <div class="container-fluid">
                    <div class="collapse mt-3" id="search-nav">
                        <form class="navbar-left navbar-form nav-search mr-md-3" action="{{ route('blog.index') }}">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <button type="submit" class="btn btn-search pr-1">
                                        <i class="fa fa-search search-icon"></i>
                                    </button>
                                </div>
                                <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search ..." class="form-control">
                            </div>
                        </form>
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
                                        <th>Nama Artikel</th>
                                        <th>Status</th>
                                        <th>Author</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogs as $index => $row)
                                    <tr>
                                        <td>{{ $index + $blogs->firstItem() }}</td>
                                        <td>{{ $row->judul }}</td>
                                        <td>
                                        @if ($row->is_active == '1')
                                            Publish
                                            @else
                                            Draft
                                        @endif</td>
                                        <td>{{ $row->users->name }}</td>
                                        <td><img src="{{ asset('storage/'. $row->gambar_artikel) }}" width="100"></td>
                                        <td>

                                            @can('edit')
                                            <a href="{{ route('blog.edit', $row->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-pen"></i>
                                            </a>
                                            @endcan


                                            @can('delete')
                                            <form action="{{ route('blog.destroy',$row->id) }}" method="POST" class="d-inline">
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
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>


        @endsection
