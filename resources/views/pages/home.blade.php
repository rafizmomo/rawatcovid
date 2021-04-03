@extends('layouts.app')
@section('title')
     RawatCovid 
@endsection
@section('content')
<header class="container">
    <div class="row">
        <div class="col-md-6 header-left">
            <h1>Diagnosis Covid-19</h1>
            <h5>Untuk Penanganan Terbaik</h5>
            <a href="{{ route("home.diagnosis") }}" class="btn btn-diagnosa">Cek Sekarang</a>
        </div>
        <div class="col-md-6 header-right">
            <img src="/frontend/images/etc/Header-Right.png" class="img-fluid" alt="">
        </div>
    </div>
</header>
<div class="header-divider">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#3423A6" fill-opacity="1"
            d="M0,128L80,112C160,96,320,64,480,74.7C640,85,800,139,960,149.3C1120,160,1280,128,1360,112L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z">
        </path>
    </svg>
</div>
<main>
    <section class="covid-info">
        <div class="container">
            <div class="row ">
                <div class="col-md-6">
                    <h2 class="pt-5">Perkembangan COVID-19 di Indonesia</h2>
                </div>
                <div class="col-md-6">
                    <p class="text-white">Tanggal : 02 Februari 2021</p>
                    <div class="row">
                        <div class="col my-2">
                            <div class="card h-100">
                                <div class="card-body text-center text-warning">
                                    <h4>{{ $api_kawal_covid['0']['positif'] }}</h4>
                                    <small>Kasus Positif</small>
                                </div>
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="card h-100">
                                <div class="card-body text-center text-success">
                                    <h4>{{ $api_kawal_covid['0']['sembuh'] }}</h4>
                                    <small>Kasus Sembuh</small>
                                </div>
                            </div>
                        </div>

                        <div class="col my-2">
                            <div class="card h-100">
                                <div class="card-body text-center text-danger">
                                    <h4>{{ $api_kawal_covid['0']['meninggal'] }}</h4>
                                    <small>Kasus Meninggal</small>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section class="urgent-info ">
        <div class="container">
            <h2 class="text-center text-white pb-3">Ayo Lakukan 3M!</h2>
            <div class="row">
                <div class="col-md  my-2">
                    <div class="card h-100 shadow mx-auto">
                        <div class="card-body text-center text-info">
                            <img src="/frontend/images/etc/Home-main-01.png" alt="Menggunakan Masker">
                            <p>Menggunakan Masker</p>
                        </div>
                    </div>
                </div>

                <div class="col-md my-2">
                    <div class="card h-100 shadow mx-auto">
                        <div class="card-body text-center text-info">
                            <img src="/frontend/images/etc/Home-main-02.png" alt="Mencuci Tangan">
                            <p>Mencuci Tangan</p>
                        </div>
                    </div>
                </div>

                <div class="col-md my-2">
                    <div class="card h-100 shadow mx-auto">
                        <div class="card-body text-center text-info">
                            <img src="/frontend/images/etc/Home-main-03.png" alt="Menghindari Kerumunan">
                            <p>Menghindari Kerumunan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="hotline-info">
        <div class="container">
            <h2 class="text-center text-white pb-3">Ayo Lakukan 3M!</h2>
            <div class="row">
                <div class="col my-2 text-center">
                    <h3>HOTLINE COVID-19</h3>
                    <h5 class="text-danger">119</h5>
                </div>

                <div class="col my-2 text-center">
                    <h3>INFORMASI COVID-19</h3>
                    <a href="https://www.covid19.go.id/">
                        <h5 class="text-info">Kementerian Kesehatan</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
