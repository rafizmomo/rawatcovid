@extends('layouts.app')

@section('content')
<header class="header-section text-center my-5">
    <a href="{{ route('home') }}" class="text-secondary">Home</a><span> / </span> <a href="{{ route('home.daftardampak') }}" class="text-secondary">Dampak Covid</a> <span> /  {{ $dampak->title }} </span>
    <h1>{{ $dampak->title }}</h1>
</header>

<main class="penyakit-section mt-3" style="margin-bottom: 100px;">
    <div class="container">
        <div class="card shadow px-3 py-5">
            <div class="p-5">
                <img src="{{Storage::url($dampak->gambar)}}" alt="{{ $dampak->title}}" class='img-fluid img-thumbnail mx-auto d-block' style="max-height: 400px">
                <br>
                <h2 class="mt-5">Keterangan</h2>
                <div>{!! $dampak->keterangan !!}</div>

                 
            </div>
        </div>
    </div>
</main>
@endsection
