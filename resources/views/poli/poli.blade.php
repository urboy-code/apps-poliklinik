@extends('adminLayout.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Poli</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('poli.create') }}" class="btn btn-success mx-1">Add</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content mt-2">
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Poli</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($polis as $poli)
                            <tr>
                                <th scope="row">{{ $poli->id }}</th>
                                <td>{{ $poli->nama }}</td>
                                <td>{{ $poli->keterangan }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('poli.destroy', $poli->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mx-1">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
