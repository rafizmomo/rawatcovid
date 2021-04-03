@extends('layouts.app')
@section('title')
     Cek Gejala Covid
@endsection
@section('content')

<main class="container">
     <div class="card shadow mt-3" style="margin-bottom: 100px;">
          <div class="card-body">
               <div class="text-center my-3">
                    <a href="{{ route('home') }}" class="text-secondary">Home</a><span> / </span><a href="{{ route('home.diagnosis') }}" class="text-dark">Diagnosa Covid</a>
                    <h1>Diagnosa Covid</h1>
               </div>
               @if ($message = Session::get('success'))
				<div class="alert alert-success alert-block">
					<strong>{{ $message }}</strong>
				</div>
               @endif
               @if ($errors->any())
                    <div class="alert alert-danger text-center">
                         @foreach ($errors->all() as $error)
                         <p>Gejala Harus diisi!</p>
                         @endforeach
                    </div>
               @endif
               <section id="diagnosis mx-5 my-5">
                    <form action="{{ route('home.hasil') }}" method="POST" enctype="multipart/form-data">
                         @csrf

                        
                         <table class="table table-borderless">
                              
                              @foreach ($gejala_covid as $gejala)
                              <tr>
                                   <td>{{ $gejala->pertanyaan }}</td>
                                   <td><input type="checkbox" name="gejala_id[]" value="{{ $gejala->id }}"></td>
                              </tr>
                              @endforeach
                              
                         </table>
                         <button type="submit" class="btn btn-diagnosa btn-block">Masukkan Diagnosa</button>
                     </form>
               </section>
          </div>
     </div>
</main>




@endsection