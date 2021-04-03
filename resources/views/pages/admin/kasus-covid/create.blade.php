@extends('layouts.admin')

@section('title')
    Tambah Kasus Covid
@endsection
@push('addon-style')

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endpush

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Kasus Covid</h1>
        <a href="{{ route('kasus-covid.index') }}" class="btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
@endif

    <div class="card shadow">
        <div class="card-body">
            @livewire('kasus-covid-livewire')
        </div>
    </div>

</div>
  <!-- /.container-fluid -->

@endsection

@push('addon-script')
@endpush