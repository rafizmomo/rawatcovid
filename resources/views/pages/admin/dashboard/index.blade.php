@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">
      <div class="col my-2">
          <div class="card h-100 shadow">
              <div class="card-body text-center text-warning">
                  <h4>{{ $api_kawal_covid['0']['positif'] }}</h4>
                  <small>Kasus Positif</small>
              </div>
          </div>
      </div>

      <div class="col my-2">
          <div class="card h-100 shadow">
              <div class="card-body text-center text-success">
                  <h4>{{ $api_kawal_covid['0']['sembuh'] }}</h4>
                  <small>Kasus Sembuh</small>
              </div>
          </div>
      </div>

      <div class="col my-2">
          <div class="card h-100 shadow">
              <div class="card-body text-center text-danger">
                  <h4>{{ $api_kawal_covid['0']['meninggal'] }}</h4>
                  <small>Kasus Meninggal</small>
              </div>
          </div>
      </div>
    </div>

    <div class="card shadow my-3">
        <div class="card-body">
            <div class="row">
                <div class="col my-2">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center text-info">
                            <h5>Total Kategori Gejala</h5>
                            <h3 class="text-dark">{{ $total_kategori_gejala }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col my-2">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center text-warning">
                            <h5>Total Gejala</h5>
                            <h3 class="text-dark">{{ $total_gejala }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col my-2">
                    <div class="card h-100 shadow">
                        <div class="card-body text-center text-danger">
                            <h5>Total Basis Kasus</h5>
                            <h3 class="text-dark">{{ $total_kasus }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('kasus-covid.index') }}" class="btn btn-success shadow-sm my-3 btn-block">
                <i class="fa fa-eye fa-sm text-white-50"></i> Lihat informasi Basis Kasus
            </a>
        </div>
    </div>
  </div>
  <!-- /.container-fluid -->
@endsection