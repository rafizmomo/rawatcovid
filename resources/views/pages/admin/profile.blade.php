@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">
  
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
  </div>
    <div class="card shadow mb-4">
      <!-- Card Header -->
  
      <!-- Card Body -->
      <div class="card-body m-2">
        <div class="row">
          <div class="col-md-4">
              <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; border-radius:50%;display: block; margin-right: auto; margin-left: auto;">
              
              <form enctype="multipart/form-data" action="/admin/profile" method="POST">
                  <div class="form-group ">
                    <label>Ubah Foto Profil</label>
                    <br>
                    <small class="text-danger">*ukuran foto 1:1</small>
                    
                    <input class="bordery" type="file" name="avatar">
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Ubah Foto
                  </button>
              </form>
          </div>
          <div class="col-md-8">
            <div class="form-group">
                <label for="name">Nama</label>
                <h5 class="text-primary" name="name">{{ $user->name }}</h5>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <h5 class="text-primary" name="email">{{ $user->email }}</h5>
            </div>

            <div class="form-group">
              <label for="roles">Role</label>
              <h5 class="text-primary" name="roles">
                @if ($user->roles === 1)
                Admin
                @else
                User
                @endif
              </h5>
            </div>
          </div>
      </div>
      <div class="row">
        
      </div>
    </div>
  </div>
      
    
</div>


    <!-- Content Row -->
  <!-- /.container-fluid -->

@endsection