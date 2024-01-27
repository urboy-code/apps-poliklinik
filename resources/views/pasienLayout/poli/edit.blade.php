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
                        <h1 class="m-0">Edit Pendaftaran Poli</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6 d-flex justify-content-end">
                        <a href="{{ route('daftarPoli.index') }}" class="btn btn-success">Back</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div>

        <div class="main-content mt-2">
            <div class="card-header">
                <h4>Daftar Poli</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('daftarPoli.update', $daftar->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="form-label">Nomor Rekam Medis</label>
                        <input type="text" class="form-control" name="rm" readonly value="{{ $nomer }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Pilih Poli</label>
                        <select name="poli_id" class="form-control">
                            <option value="">Open this select menu</option>
                            @foreach ($polis as $poli)
                                <option {{$poli->id == $daftar->poli_id ? 'selected' : ''}} value="{{ $poli->id }}">{{ $poli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Pilih Jadwal</label>
                        <select name="jadwal_id" id="" class="form-control">
                            <option value="">Open this select menu</option>
                            @foreach ($jadwals as $jadwal)
                                <option {{$jadwal->id == $daftar->jadwal_id ? 'selected' : ''}} value="{{ $jadwal->id }}">
                                    {{ $jadwal->nama .
                                        '|' .
                                        $jadwal->hari->hari .
                                        '|' .
                                        $jadwal->mulai .
                                        '|' .
                                        $jadwal->selesai }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Keterangan</label>
                        <textarea name="keterangan" id="" cols="30" rows="5" class="form-control">{{$daftar->keterangan}}</textarea>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection
