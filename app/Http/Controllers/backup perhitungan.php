<?php

//* memanggil data revise, gejala, dan kasus
$data_revise = ReviseCovid::with(
'kategori_gejala_covid'
)->get();
$data_gejala = GejalaCovid::all();
$data_kasus_lama = KasusCovid::all();
$data_kategori_gejala = KategoriGejalaCovid::all();

//* masukkan data dan hitung jumlah data
$data_kasus_baru = $request->input('gejala_id');
$count_data_kasus_baru = count($data_kasus_baru);

//* cek gejala gejala yang masuk

// foreach ($data_kasus_baru as $key_data_kasus_baru => $id_gejala_baru) {
// print_r($id_gejala_baru);
// echo " ";
// }

$array_result = [];

foreach ($data_revise as $revise) {

//* Menghitung total gejala revise covid yang sama dengan kasus
$count_data_kasus_lama = KasusCovid::where('revise_covid_id', '=', $revise->id)->count();


$s = 0;
$w = 0;
$sigma_w = 0;
$sigma_sw = 0;
$sw = 0;
$result = 0;


if ($count_data_kasus_lama >= $count_data_kasus_baru) {

foreach ($data_kasus_lama as $kasus_lama) {

if ($revise->id === $kasus_lama->revise_covid_id) {
$id_gejala_kasus_lama = $kasus_lama->gejala_covid_id;

foreach ($data_gejala as $gejala) {

if ($gejala->id === $id_gejala_kasus_lama) {
$w = $gejala->bobot;


foreach ($data_kasus_baru as $index => $kasus_baru) {
$id_gejala_kasus_baru = intval($kasus_baru);

if ($id_gejala_kasus_lama === $id_gejala_kasus_baru) {

$s = 1;
$sw = $s * $w;
} else {
$s = 0;
$sw = $s * $w;
}
$sigma_sw = $sigma_sw + $sw;
}
$sigma_w = $sigma_w + $w;
}
}
}
}

$result = ($sigma_sw / $sigma_w) * 100;
echo "hasil pembagian adalah ";
echo $result;
echo "<br>";

$array_result[$revise->id] = $result;

foreach ($data_kategori_gejala as $kategori_gejala) {
if ($revise->kategori_gejala_id === $kategori_gejala->id) {
$array_kategori_gejala[$revise->id] = $kategori_gejala->id;
}
}
} elseif ($count_data_kasus_lama < $count_data_kasus_baru) { foreach ($data_kasus_baru as $index=> $kasus_baru) {
    $id_gejala_kasus_baru = intval($kasus_baru);

    foreach ($data_gejala as $gejala) {
    if ($gejala->id === $id_gejala_kasus_baru) {

    $w = $gejala->bobot;

    foreach ($data_kasus_lama as $kasus_lama) {

    if ($revise->id === $kasus_lama->revise_covid_id && $kasus_lama->gejala_covid_id === $id_gejala_kasus_baru) {

    $s = 1;
    $sw = $s * $w;
    $sigma_sw = $sigma_sw + $sw;
    } else {
    $s = 0;
    $sw = $s * $w;
    $sigma_sw = $sigma_sw + $sw;
    }
    }

    $sigma_w = $sigma_w + $w;
    }
    }
    }
    $result = ($sigma_sw / $sigma_w) * 100;
    echo "hasil pembagian adalah ";
    echo $result;
    echo "<br>";

    $array_result[$revise->id] = $result;

    foreach ($data_kategori_gejala as $kategori_gejala) {
    if ($revise->kategori_gejala_id === $kategori_gejala->id) {
    $array_kategori_gejala[$revise->id] = $kategori_gejala->id;
    }
    }
    }

    echo "<br>";
    }

    print_r($array_result);
    echo "<br>";

    $nilai_max_result = (max($array_result));
    echo "<br>";
    $array_id_revise_max = array_keys($array_result, $nilai_max_result);

    foreach ($array_id_revise_max as $index => $id_revise_result) {
    foreach ($array_kategori_gejala as $id_revise_kategori_gejala => $kategori_gejala) {
    if ($id_revise_result === $id_revise_kategori_gejala) {
    $id_kategori_gejala_baru = $kategori_gejala;
    }
    }
    }

    echo $id_kategori_gejala_baru;
