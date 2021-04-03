@extends('layouts.app')
@section('title')
     Hasil Pengecekan
@endsection
@push('addon-style')
    <link href="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endpush
@section('content')

<main class="container">
     <div class="card shadow mt-3" style="margin-bottom: 100px;">
          <div class="card-body">
                <div class="text-center my-3">
                    <a href="{{ route('home') }}" class="text-secondary">Home</a><span> / </span><a href="{{ route('home.diagnosis') }}" class="text-secondary">Diagnosa Covid</a><span> / Hasil Diagnosa</span>
                    <h1>Hasil Diagnosa Covid</h1>
                    <h6 class="text-secondary">Metode CBR <i>(Cased Based Reasoning)</i></h6>
                </div>
                <div class="mx-5 my-5" id="content">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Total Gejala Kasus Baru</th>
                                <th>Total Gejala Kasus Lama</th>
                                <th>Total Gejala Yang Cocok</th>
                                <th>Total Bobot Kasus Baru</th>
                                <th>Total Bobot Kasus Lama</th>
                                <th>Total Bobot Yang Cocok</th>
                                <th>Pembagi</th>
                                <th>Nilai Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_revise as $revise)
                            <tr>
                                @php
                                    $s = 0;
                                    $w = 0;
                                    $sigma_w = 0;
                                    $sigma_sw = 0;
                                    $sw = 0;
                                    $result = 0;
                                    $total_bobot_kasus_baru= 0;
                                    $total_bobot_kasus_lama= 0;
                                    $kasus_sama = 0;
                                    $total_bobot_kasus_sama = 0;
                                    $count_gejala = 0;
                                @endphp

                                <td ><b>{{ $revise->id }}</b></td>
                                <td>{{ $revise->kategori_gejala_covid->kategori }}</td>
                                <td>
                                    @foreach ($data_kasus_baru as $index => $kasus_baru)
                                        @foreach ($data_gejala as $gejala)
                                            @if ($gejala->id == $kasus_baru)
                                                {{ $gejala->gejala }},
                                            @endif
                                        @endforeach
                                    @endforeach
                                    Total : {{ $count_data_kasus_baru }}</td>
                                <td>
                                    @foreach ($data_kasus_lama as $kasus_lama)
                                        @foreach ($data_gejala as $gejala)
                                            @if ($gejala->id == $kasus_lama->gejala_covid_id && $kasus_lama->revise_covid_id === $revise->id)
                                                {{ $gejala->gejala }},
                                            @endif
                                        @endforeach
                                    @endforeach
                                    Total : {{ $count_data_kasus_lama = $data_kasus_lama->where('revise_covid_id', '=', $revise->id)->count() }}
                                </td>
                                <td><b>
                                    @foreach ($data_kasus_baru as $index => $kasus_baru)
                                        @foreach ($data_kasus_lama as $kasus_lama)
                                            @if ($kasus_baru == $kasus_lama->gejala_covid_id && $kasus_lama->revise_covid_id === $revise->id)
                                                @php
                                                    $kasus_sama = $kasus_sama + 1;
                                                    $kasus_mirip =  $kasus_lama->gejala_covid_id;
                                                @endphp
                                                @foreach ($data_gejala as $gejala)
                                                @if ($gejala->id == $kasus_mirip)
                                                    {{ $gejala->gejala }},
                                                @endif
                                             @endforeach
                                            @endif
                                        @endforeach
                                    @endforeach
                                Total : {{ $kasus_sama }} Gejala</b>
                                </td>
                                <td>
                                    @foreach ($data_kasus_baru as $kasus_baru)
                                        @foreach ($data_gejala as $gejala)
                                            @if ($gejala->id == $kasus_baru)
                                                @php
                                                $total_bobot_kasus_baru = $total_bobot_kasus_baru + $gejala->bobot;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                    {{ $total_bobot_kasus_baru }}
                                </td>
                                <td>
                                    @foreach ($data_kasus_lama as $kasus_lama)
                                        @foreach ($data_gejala as $gejala)
                                            @if ($gejala->id === $kasus_lama->gejala_covid_id && $kasus_lama->revise_covid_id === $revise->id)
                                                @php
                                                $total_bobot_kasus_lama = $total_bobot_kasus_lama + $gejala->bobot;
                                                @endphp
                                            @endif
                                        @endforeach
                                    @endforeach
                                    {{ $total_bobot_kasus_lama}}
                                </td>
                                <td>
                                    <b>
                                    @foreach ($data_kasus_baru as $index => $kasus_baru)
                                        @foreach ($data_kasus_lama as $kasus_lama)
                                            @foreach ( $data_gejala as $gejala)
                                                @if ($kasus_baru == $kasus_lama->gejala_covid_id && $kasus_baru == $gejala->id && $kasus_lama->revise_covid_id === $revise->id)
                                                    @php
                                                        $total_bobot_kasus_sama = $total_bobot_kasus_sama + $gejala->bobot;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endforeach
                                    {{ $total_bobot_kasus_sama }}
                                    </b>
                                </td>
                                <td>
                                    @if ($count_data_kasus_lama >= $count_data_kasus_baru)
                                        Total Bobot Gejala <b>Kasus Lama</b>
                                    @elseif($count_data_kasus_lama < $count_data_kasus_baru)
                                        Total Bobot Gejala <b>Kasus Baru</b>
                                    @endif
                                </td>
                                <td>
                                    <b>
                                        @if ($count_data_kasus_lama >= $count_data_kasus_baru)
                                            @foreach ($data_kasus_lama as $kasus_lama)
                                                @if ($revise->id === $kasus_lama->revise_covid_id)
                                                    @php
                                                        $id_gejala_kasus_lama = $kasus_lama->gejala_covid_id;
                                                    @endphp
                                                    @foreach ($data_gejala as $gejala)
                                                        @if ($gejala->id === $id_gejala_kasus_lama)
                                                            @php
                                                                $w = $gejala->bobot;
                                                            @endphp
                                                            @foreach ($data_kasus_baru as $index => $kasus_baru)
                                                                @php
                                                                    $id_gejala_kasus_baru = intval($kasus_baru);
                                                                @endphp
                                                                @if ($id_gejala_kasus_lama === $id_gejala_kasus_baru)
                                                                    @php
                                                                        $s = 1;
                                                                        $sw = $s * $w;
                                                                    @endphp
                                                                @else
                                                                    @php
                                                                        $s = 0;
                                                                        $sw = $s * $w;
                                                                    @endphp
                                                                @endif
                                                                @php
                                                                    $sigma_sw = $sigma_sw + $sw;
                                                                @endphp
                                                            @endforeach
                                                            @php
                                                                $sigma_w = $sigma_w + $w;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach
                                            @php
                                                $result = ($sigma_sw / $sigma_w) * 100;
                                                $result = round($result, 2)
                                            @endphp
                                            {{ $result }}%

                                            @php
                                                $array_result[$revise->id] = $result;
                                            @endphp
                                            @foreach ($data_kategori_gejala as $kategori_gejala)
                                                @if ($revise->kategori_gejala_id === $kategori_gejala->id)
                                                    @php
                                                        $array_kategori_gejala[$revise->id] = $kategori_gejala->id;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @elseif($count_data_kasus_lama < $count_data_kasus_baru)
                                            @foreach ($data_kasus_baru as $index => $kasus_baru)
                                                @php
                                                    $id_gejala_kasus_baru = intval($kasus_baru);
                                                @endphp
                                                @foreach  ($data_gejala as $gejala)
                                                    @if ($gejala->id === $id_gejala_kasus_baru)
                                                    @php
                                                        $w = $gejala->bobot;
                                                    @endphp
                                                        @foreach ($data_kasus_lama as $kasus_lama)
                                                            @if ($revise->id === $kasus_lama->revise_covid_id && $kasus_lama->gejala_covid_id === $id_gejala_kasus_baru)
                                                                @php
                                                                    $s = 1;
                                                                    $sw = $s * $w;
                                                                    $sigma_sw = $sigma_sw + $sw;
                                                                @endphp
                                                            @else
                                                                @php
                                                                    $s = 0;
                                                                    $sw = $s * $w;
                                                                    $sigma_sw = $sigma_sw + $sw;
                                                                @endphp
                                                            @endif
                                                            
                                                        @endforeach
                                                        @php
                                                            $sigma_w = $sigma_w + $w;
                                                        @endphp
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            @php
                                                $result = (($revise->persentase_kecocokan/100)*($sigma_sw / $sigma_w)*100);
                                                $result = round($result, 2)
                                            @endphp
                                            {{ $result }}%
                                            @php
                                                $array_result[$revise->id] = $result;
                                            @endphp

                                            @foreach ($data_kategori_gejala as $kategori_gejala)
                                                @if ($revise->kategori_gejala_id === $kategori_gejala->id)
                                                    @php
                                                        $array_kategori_gejala[$revise->id] = $kategori_gejala->id;
                                                    @endphp
                                                @endif
                                            @endforeach
                                        @endif
                                    </b>
                                </td>
                            </tr>
                            @php
                                $nilai_max_result = (max($array_result));
                                $array_id_revise_max = array_keys($array_result, $nilai_max_result);
                            @endphp
                            @endforeach
                            @foreach ($array_id_revise_max as $index => $id_revise_result)
                                @foreach ($array_kategori_gejala as $id_revise_kategori_gejala => $kategori_gejala)
                                    @if ($id_revise_result === $id_revise_kategori_gejala)
                                        @php
                                            $id_kategori_gejala_baru = $kategori_gejala;
                                        @endphp
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card card-body bg-success text-light mt-5 mb-3 px-3 py-3 text-center">
                       <p>Hasil diagnosis menggunakan metode CBR didapatkan bahwa kasus dengan gejala
                           <b>
                           @foreach ($data_kasus_baru as $index => $kasus_baru)
                            @php
                                $count_gejala=$count_gejala+1;
                            @endphp
                            @if ($count_gejala > 1 && $count_gejala < $count_data_kasus_baru)
                                <span>,</span>
                            @elseif ($count_gejala == $count_data_kasus_baru)
                                <span>dan</span>
                            @endif
                               @foreach ($data_gejala as $gejala)
                                   @if ($kasus_baru == $gejala->id)
                                       {{ $gejala->gejala }}
                                   @endif
                               @endforeach
                           @endforeach
                           </b>
                           termasuk kedalam kategori 
                           <b>
                           @foreach ($data_kategori_gejala as $kategori_gejala)
                               @if ($kategori_gejala->id === $id_kategori_gejala_baru)
                                   {{ $kategori_gejala->kategori }}
                               @endif
                           @endforeach
                            </b>
                            dengan persentase sebesar
                            <b>{{ $nilai_max_result }}%</b>
                       </p>
                    </div>
                </div>
                <div class="card shadow my-3 p-3">
                    <h3>Solusi</h3>
                    <br>
                    @foreach ($data_kategori_gejala as $kategori_gejala)
                        @if ($kategori_gejala->id === $id_kategori_gejala_baru)
                            {{ $kategori_gejala->solusi }}
                        @endif
                    @endforeach
                </div>
                <div class="mb-5">
                    <form action="{{ route('home.simpanhasil') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" hidden>
                            <label class="font-weight-bold" for="persentase_kecocokan">Persentase Kecocokan</label>
                            <input type="text" class="form-control" name="persentase_kecocokan" value="{{ $nilai_max_result }}">
                        </div>
                        {{-- DOne --}}

                        <div class="form-group" hidden>
                            <label for="kategori_gejala_id">Kategori Covid</label>
                            <input type="text" class="form-control" name="kategori_gejala_id" value="{{ $id_kategori_gejala_baru }}">
                        </div>

                            @foreach ($data_kasus_baru as $index => $kasus_baru)
                            <div class="form-group" hidden>
                                <label for="gejala_id">Gejala Covid</label>
                                <input type="text" class="form-control" name="gejala_id[{{ $index }}]" value="{{ $kasus_baru }}">
                            </div>                            
                            @endforeach

                        </table>
                        <button type="submit" class="btn btn-diagnosa btn-block"><b>Bantu Kami agar dapat menyimpan hasil diagnosa sebelumnya dengan klik disini!</b></button>
                    </form>
                </div>
          </div>
     </div>
</main>

@endsection

@push('addon-script')
<script src="{{ url('backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
        $('#dataTable').DataTable({
            order: [[ 9, 'desc' ] ]
        });
    });
</script>
@endpush