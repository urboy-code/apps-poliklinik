@extends('dokter.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0">Jadwal Periksa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('jadwal_periksa.create') }}" class="btn btn-success mx-1">Add</a>
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
                            <th scope="col" style="width: 25%">Nama Dokter</th>
                            <th scope="col" style="width: 10%">Hari</th>
                            <th scope="col" style="width: 20%">Jam Mulai</th>
                            <th scope="col" style="width: 10%">Jam Selesai</th>
                            <th scope="col" style="width: 10%">Status</th>
                            <th scope="col" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($periksa as $periksa)
                            <tr>
                                <th scope="row">{{ $periksa->id }}</th>
                                <td>{{ $periksa->nama }}</td>
                                <td>{{ $periksa->hari->hari }}</td>
                                <td>{{ $periksa->mulai }}</td>
                                <td>{{ $periksa->selesai }}</td>
                                <td>{{$periksa->status->status}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('jadwal_periksa.edit', $periksa->id) }}"
                                            class="btn btn-primary">Edit</a>
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
