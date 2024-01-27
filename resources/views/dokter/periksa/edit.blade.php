@extends('dokter.master')

@section('content')
    <div class="content-wrapper">
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Jadwal Periksa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('jadwal_periksa.index') }}" class="btn btn-success mx-1">Back</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content mt-2">
            <div class="card-body">
                <form action="{{route('jadwal_periksa.update', $periksa->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nama Dokter</label>
                        <input type="text" class="form-control" name="nama" value="{{$periksa->nama}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Hari</label>
                        <select name="hari_id" class="form-control">
                            <option readonly value="">Pilih Hari</option>
                            @foreach ($haris as $hari)
                                <option {{$hari->id == $periksa->hari_id ? 'selected' : ''}} value="{{$hari->id}}">{{$hari->hari}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jam Mulai</label>
                        <input type="time" class="form-control" name="mulai" value="{{$periksa->mulai}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Jam Selesai</label>
                        <input type="time" class="form-control" name="selesai" value="{{$periksa->selesai}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Status Dokter</label>
                        <select name="status_id" class="form-control">
                            <option value="">Pilih Status</option>
                            @foreach ($status as $status)
                                <option {{$status->id == $periksa->status_id ? 'selected' : ''}} value="{{$status->id}}">{{$status->status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
