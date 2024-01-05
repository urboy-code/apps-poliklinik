@extends('layouts.master')

@section('content')

    <section class="hero text-center justify-content-center bg-primary" style="padding: 10rem 0">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="fw-bold text-white display-5">SISITEM TEMU JANJI</h1>
                    <h2 class="fw-bold text-white">PASIEN - DOKTER</h2>
                    <p class="text-white">Bimbingan Karir 2023 Bidang Web</p>
                </div>
            </div>
        </div>
    </section>

    <section class="main-content" style="padding: 5rem 0">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card" style="border-radius: 1rem">
                        <div class="card-body p-5">
                            <i class="bi bi-person-square fs-1" style="color: blue"></i>
                            <h2 class="card-title">Login Sebagai Pasien</h2>
                            <p class="card-text">Apabila Anda adalah seorang Pasien, silahkan Login terlebih dahulu
                                untuk melakukan pendaftaran sebagai Pasien!</p>
                            <a href="{{route('login')}}" class="btn btn-primary">Masuk</a>
                            <a href="{{route('register')}}" class="btn btn-primary">Daftar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card" style="border-radius: 1rem">
                        <div class="card-body p-5">
                            <i class="bi bi-person-square fs-1" style="color: blue"></i>
                            <h2 class="card-title">Login Sebagai Dokter</h2>
                            <p class="card-text">Apabila Anda adalah seorang Dokter, silahkan Login terlebih dahulu
                                untuk memulai melayani Pasien!</p>
                            <a href="{{route('login')}}" class="btn btn-primary">Masuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection    
