@extends('adminLayout.master')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pasien</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('pasien.create') }}" class="btn btn-success mx-1">Add</a>
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
                            <th scope="col" style="width: 20%">No. RM</th>
                            <th scope="col" style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pasien as $pasien)
                            <tr>
                                <th scope="row">{{$pasien->id}}</th>
                                <td>{{$pasien->nama}}</td>
                                <td>{{$pasien->alamat}}</td>
                                <td>{{$pasien->ktp}}</td>
                                <td>{{$pasien->hp}}</td>
                                <td>{{date('Ym', strtotime($pasien->created_at))}}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{route('pasien.edit', $pasien->id)}}" class="btn btn-primary">Edit</a>

                                        <form action="{{route('pasien.destroy', $pasien->id)}}" method="POST">
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
