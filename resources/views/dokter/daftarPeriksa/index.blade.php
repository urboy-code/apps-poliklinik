@extends('dokter.master');
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3 class="m-0">Jadwal Periksa</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content mt-2">
            <div class="card-body">
                <table class="table table-striped table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 20%">No Urut</th>
                            <th scope="col" style="width: 25%">Nama Pasien</th>
                            <th scope="col" style="width: 25%">Keluhan</th>
                            <th scope="col" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftars as $daftar)
                            
                        <tr>
                            <th scope="row">{{$daftar->rm}}</th>
                            <td>{{$daftar->pasien->nama}}</td>
                            <td>{{$daftar->keterangan}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{route('daftarPasien.destroy', $daftar->id)}}" method="POST">
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
