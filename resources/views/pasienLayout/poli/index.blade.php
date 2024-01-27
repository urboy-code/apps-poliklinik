@extends('pasienLayout.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Riwayat Daftar Poli</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('daftarPoli.create') }}" class="btn btn-success mx-1">Add</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content m-5">
            <div class="card-header">
                <h4>Riwayat Daftar Poli</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 10%">No</th>
                            <th scope="col" style="width: 20%">Nama Pasien</th>
                            <th scope="col" style="width: 20%">Poli</th>
                            <th scope="col" style="width: 20%">Dokter</th>
                            <th scope="col" style="width: 10%">Hari</th>
                            <th scope="col" style="width: 20%">Mulai</th>
                            <th scope="col" style="width: 20%">Selesai</th>
                            <th scope="col" style="width: 20%">Antrian</th>
                            <th scope="col" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftar as $daftar)
                            <tr>
                                <th scope="row">{{$daftar->id}}</th>
                                <th>{{$daftar->pasien->nama}}</th>
                                <td>{{$daftar->poli->nama}}</td>
                                <td>{{$daftar->jadwal->nama}}</td>
                                <td>{{$daftar->jadwal->hari->hari}}</td>
                                <td>{{$daftar->jadwal->mulai}}</td>
                                <td>{{$daftar->jadwal->selesai}}</td>
                                <td>{{$daftar->rm}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('daftarPoli.edit', $daftar->id)}}" class="btn btn-primary">Edit</a>

                                        <form action="{{route('daftarPoli.destroy', $daftar->id)}}" method="POST">
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
