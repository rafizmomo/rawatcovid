@extends('layouts.admin')

@section('title')
    Tambah Dampak Covid
@endsection

@push('addon-style')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endpush

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Dampak Covid</h1>
        <a href="{{ route('dampak-covid.index') }}" class="btn btn-sm btn-secondary shadow-sm">
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
            <form action="{{ route('dampak-covid.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="font-weight-bold" for="title">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul..." value="{{ old('title') }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold" for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar" placeholder="Gambar Ilustrasi..." value="{{ old('gambar') }}">
                </div>

                <div class="form-group">
                    <label class="font-weight-bold" for="keterangan">Keterangan</label>
                    <textarea name="keterangan"   placeholder="Keterangan Terkait...">{{ old('keterangan') }}</textarea>
                </div>

                <div class="form-group " hidden>
                    <label class="font-weight-bold" for="user_id">ID User</label>
                    <input type="text" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                </div>
    
                <button type="submit" class="btn btn-primary btn-block">
                    Simpan
                </button>
            </form>
        </div>
    </div>

</div>
  <!-- /.container-fluid -->

@endsection

@push('addon-script')
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'keterangan' , {
        height: 150
    });
</script>
@endpush