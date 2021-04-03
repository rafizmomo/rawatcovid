@extends('layouts.admin')

@section('title')
    Ubah Gejala Covid
@endsection
@push('addon-style')
@endpush

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Gejala Covid</h1>
        <a href="{{ route('gejala-covid.index') }}" class="btn btn-sm btn-secondary shadow-sm">
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
            <form action="{{ route('gejala-covid.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold" for="gejala">Gejala Covid</label>
                    <input type="text" class="form-control" name="gejala" placeholder="Kategori Gejala..." value="{{ $item->gejala }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="pertanyaan">Pertanyaan Terkait Gejala</label>
                    <input type="text" class="form-control" name="pertanyaan" placeholder="Pertanyaan Terhadap Gejala..." value="{{ $item->gejala }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="bobot">Bobot Gejala</label>
                    <select name="bobot" required class="form-control">
                        <option value="{{ $item->gejala }}">{{ $item->gejala }}</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="form-group " hidden>
                    <label class="font-weight-bold" for="user_id">ID User</label>
                    <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
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