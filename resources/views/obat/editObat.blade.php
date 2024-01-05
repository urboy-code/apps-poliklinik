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
                        <h1 class="m-0">Edit Obat</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('obat.index') }}" class="btn btn-success">Back</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <div class="main-content mt-2">
            <div class="card-body">

                <form action="{{ route('obat.update', $obat->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nama Obat</label>
                        <input type="text" class="form-control" name="nama" value="{{$obat->nama}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Kemasan</label>
                        <input type="text" class="form-control" name="kemasan" value="{{$obat->kemasan}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Harga</label>
                        <input type="number" class="form-control" name="harga" value="{{$obat->harga}}">
                    </div>

                    <button class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
