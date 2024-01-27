@extends('dokter.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Riwayat Pasien</h1>
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
                            <th scope="col" style="width: 15%">No. KTP</th>
                            <th scope="col" style="width: 12%">No. Hp</th>
                            <th scope="col" style="width: 12%">No. RM</th>
                            <th scope="col" style="width: 10%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($daftars as $daftar)
                            
                        <tr>
                            <th scope="row">{{$daftar->pasien->id}}</th>
                            <td>{{$daftar->pasien->nama}}</td>
                            <td>{{$daftar->pasien->alamat}}</td>
                            <td>{{$daftar->pasien->ktp}}</td>
                            <td>{{$daftar->pasien->hp}}</td>
                            <td>{{$daftar->rm}}</td>
                            <td>
                                <div class="d-flex">
                                    <a href="" class="btn btn-info">Show</a>
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
