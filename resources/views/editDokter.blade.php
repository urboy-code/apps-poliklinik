@extends('adminLayout.master')

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
                        <h1 class="m-0">Tambahkan Dokter</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('dokter.index') }}" class="btn btn-success">Back</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>
        <div class="main-content mt-2">
            <div class="card-body">

                <form action="{{route('dokter.update', $dokter->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nama</label>
                        <input type="text" class="form-control" value="{{ $dokter->nama }}" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Alamat</label>
                        <input type="text" class="form-control" value="{{ $dokter->alamat }}" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">No. Hp</label>
                        <input type="number" class="form-control" value="{{ $dokter->no_hp }}" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Poli</label>
                        <select name="poli_id" id="" class="form-control">
                            @foreach ($polis as $poli)
                                <option {{ $poli->id == $dokter->poli_id ? 'selected' : '' }} value="{{ $poli->id }}">
                                    {{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
