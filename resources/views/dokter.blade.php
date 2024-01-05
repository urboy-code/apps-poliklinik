@extends('adminLayout.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dokter</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('dokter.create') }}" class="btn btn-success mx-1">Add</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content mt-2">
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%">No</th>
                            <th scope="col" style="width: 15%">Nama</th>
                            <th scope="col" style="width: 30%">Alamat</th>
                            <th scope="col" style="width: 20%">No. Hp</th>
                            <th scope="col" style="width: 10%">Poli</th>
                            <th scope="col" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokters as $dokter)
                            <tr>
                                <th scope="row">{{ $dokter->id }}</th>
                                <td>{{ $dokter->nama }}</td>
                                <td>{{ $dokter->alamat }}</td>
                                <td>{{ $dokter->no_hp }}</td>
                                <td>{{ $dokter->poli->nama }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('dokter.edit', $dokter->id) }}" class="btn btn-primary">Edit</a>

                                        <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST">
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
