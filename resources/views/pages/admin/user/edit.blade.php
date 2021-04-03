@extends('layouts.admin')

@section('title')
    Edit User
@endsection

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User {{ $item->title }}</h1>
        <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary shadow-sm">
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
            <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama" value="{{ $item->name }}">
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{ $item->username }}">
                </div>

                <div class="form-group">
                    <label for="roles">ROLES</label>
                    <select  name="roles" required class=" form-control">
                        <option value="{{ $item->roles }}">{{ $item->roles }}</option>
                        @if ( $item->roles === "1")
                        <option value="2">USER</option>
                        @else
                        <option value="1">ADMIN</option>
                        @endif
                    </select>
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
<script src="{{ url('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script src="{{ url('ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    /*tinymce.init({
    selector: '#mytextarea'
    });
</script>
<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
  </script>
<script>
    CKEDITOR.replace('mytextarea', options);
</script>
@endpush