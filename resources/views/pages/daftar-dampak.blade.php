@extends('layouts.app')

@section('content')
<header class="header-section text-center my-5">
        <a href="{{ route('home') }}" class="text-secondary">Home</a><span> / </span>  <a href="{{ route('home.daftardampak') }}" class="text-dark">Dampak Covid</a>
        <h1>Dampak Covid</h1>
        <p>Informasi mengenai dampak dari COVID-19</p>
</header>
<main class="dampak-section" style="margin-bottom: 100px;">
    <div class="container">
        <div class="card shadow px-3 py-5">
            <div class="row">
                @foreach ($daftar_dampak as $dampak)
                <div class="col-3 mx-auto">
                    <div class="card h-100" style="width: 16rem">
                        <img class="card-img-top" src="{{Storage::url($dampak->gambar)}}" alt="{{ $dampak->gambar }}">
                        <div class="card-body">
                            <h3 class="card-title font-weight-bold">{{ $dampak->title}}</h3>
                            <br>
                            <a href="{{ route('home.dampak', $dampak->slug) }}" class="btn btn-diagnosis">Lihat Informasi</a>
                        </div>
                    </div>
                </div>
                @endforeach
        </div>

        </div>
    </div>
</main>
@endsection
