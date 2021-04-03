@extends('layouts.admin')

@section('title')
    Ubah Kasus Covid
@endsection
@push('addon-style')
@endpush

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Kasus Covid</h1>
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
            <form action="{{ route('kasus-covid.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="kategori_gejala_id">Kategori Covid</label>
                    <select  name="kategori_gejala_id" required class=" form-control">
                        @foreach ($kategori_gejala_covid as $kategori)
                            <option value="{{ $kategori->id }}"
                                @if ($kategori->id === $item->kategori_gejala_id)
                                    selected
                                @endif
                                >
                                {{ $kategori->kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="gejala_id">Gejala Covid</label>
                    <select  name="gejala_id" required class=" form-control">
                        @foreach ($gejala_covid as $gejala)
                        <option value="{{ $gejala->id }}"
                            @if ($gejala->id === $item->gejala_id)
                                selected
                            @endif
                            >
                            {{ $gejala->gejala }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" hidden>
                    <label class="font-weight-bold" for="nilai_kondisi">Nilai Kondisi</label>
                    <input type="text" class="form-control" name="nilai_kondisi" value="1">
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Ubah
                </button>
            </form>
        </div>
    </div>

</div>
  <!-- /.container-fluid -->

@endsection

@push('addon-script')
@endpush