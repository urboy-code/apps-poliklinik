@extends('pasienLayout.master')

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
                        <h1 class="m-0">Edit Pasien</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('pasien.index') }}" class="btn btn-success">Back</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content mt-2">
            <div class="card-body">

                <form action="{{route('daftar.update', $pasien->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $pasien->nama }}" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" value="{{ $pasien->alamat }}" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">No. KTP</label>
                        <input type="number" class="form-control" value="{{ $pasien->ktp }}" name="ktp">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">No. Hp</label>
                        <input type="number" class="form-control" value="{{ $pasien->hp }}" name="hp">
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
