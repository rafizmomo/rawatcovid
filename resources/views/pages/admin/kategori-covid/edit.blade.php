@extends('layouts.admin')

@section('title')
    Ubah Kategori Gejala Covid
@endsection
@push('addon-style')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
@endpush

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Kategori Gejala Covid</h1>
        <a href="{{ route('kategori-covid.index') }}" class="btn btn-sm btn-secondary shadow-sm">
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
            <form action="{{ route('kategori-covid.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="font-weight-bold" for="kategori">Kategori Gejala</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Kategori Gejala..." value="{{ $item->kategori }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold"  for="solusi">Solusi</label>
                    <textarea name="solusi" placeholder="Solusi...">{{ $item->solusi }}</textarea>
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
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'solusi' , {
        height: 150
    });
     
</script>
@endpush