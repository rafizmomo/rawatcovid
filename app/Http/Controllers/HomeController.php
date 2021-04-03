<?php

namespace App\Http\Controllers;

use App\Models\DampakCovid;
use App\Models\GejalaCovid;
use App\Models\KasusCovid;
use App\Models\KategoriGejalaCovid;
use App\Models\ReviseCovid;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $client = new Client(); //GuzzleHttp\Client
        // $url = "https://api.kawalcorona.com/indonesia";


        // $response = $client->request('GET', $url, [
        //     'verify'  => false,
        // ]);

        // $responseBody = json_decode($response->getBody());

        try {
            $api_kawal_covid = Http::get('https://api.kawalcorona.com/indonesia')->json();
        } catch (Exception $exc) {
            $api_kawal_covid = [];
        }


        return view('pages.home', ['api_kawal_covid' => $api_kawal_covid]);
    }

    public function diagnosis()
    {
        $gejala_covid = GejalaCovid::all();
        return view('pages.diagnosis', [
            'gejala_covid' => $gejala_covid
        ]);
    }

    public function hasil(Request $request)
    {
        $validated = $request->validate([
            'gejala_id' => 'required'
        ]);

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

        //! Testing Algoritma
        //* Done
        //? Bagaimana cara menstore data

        // foreach ($data_revise as $revise) {

        //* Menghitung total gejala revise covid yang sama dengan kasus
        //     $count_data_kasus_lama = KasusCovid::where('revise_covid_id', '=', $revise->id)->count();

        //* Membuat variabel baru
        //     $s = 0;
        //     $w = 0;
        //     $sigma_w = 0;
        //     $sigma_sw = 0;
        //     $sw = 0;
        //     $result = 0;

        //* Membuat logika sederhana
        //* Jika kasus lama lebih besar dari kasus baru
        //     if ($count_data_kasus_lama >= $count_data_kasus_baru) {

        //* Dilakukan Looping untuk data kasus lama
        //         foreach ($data_kasus_lama as $kasus_lama) {

        //* Jika id revise sama dengan id revise yang berada dalam tabel kasus lama
        //             if ($revise->id === $kasus_lama->revise_covid_id) {

        //* id gejala kasus lama dimasukkan kedalam variabel baru
        //                 $id_gejala_kasus_lama = $kasus_lama->gejala_covid_id;

        //* Dilakukan looping data gejala
        //                 foreach ($data_gejala as $gejala) {

        //* Dilakukan looping data gejala
        //                     if ($gejala->id === $id_gejala_kasus_lama) {

        //*bobot dimasukkan kedalam variabel w
        //                         $w = $gejala->bobot;

        //* dilakukan looping terhadap kasus baru
        //                         foreach ($data_kasus_baru as $index => $kasus_baru) {

        //* id kasus baru tersebut dipecah dari string menjadi float
        //                             $id_gejala_kasus_baru = intval($kasus_baru);

        //* Jika kasus lama sama dengan id kasus baru maka
        //* s = 1
        //* sw = s* w
        //* dan jika tidak maka
        //* s = 0
        //                             if ($id_gejala_kasus_lama === $id_gejala_kasus_baru) {

        //                                 $s = 1;
        //                                 $sw = $s * $w;
        //                             } else {
        //                                 $s = 0;
        //                                 $sw = $s * $w;
        //                             }

        //* lalu untuk sigma sw merupakan hasil dari total sw
        //                             $sigma_sw = $sigma_sw + $sw;
        //                         }

        //* lalu untuk sigma w merupakan hasil dari total w
        //                         $sigma_w = $sigma_w + $w;
        //                     }
        //                 }
        //             }
        //         }

        //* keseluruhan nilai akan diolah yaitu sigma sw dibagi sigma w dikalikan 100
        //* hasil dari result dimasukkan kedalam array dengan index dari array adalah id dari kasus
        //* begitu pula untuk tiap kategori
        //         $result = ($sigma_sw / $sigma_w) * 100;
        //         echo "hasil pembagian adalah ";
        //         echo $result;
        //         echo "<br>";

        //
        //         $array_result[$revise->id] = $result;

        //         foreach ($data_kategori_gejala as $kategori_gejala) {
        //             if ($revise->kategori_gejala_id === $kategori_gejala->id) {
        //                 $array_kategori_gejala[$revise->id] = $kategori_gejala->id;
        //             }
        //         }

        //* jika kasus lama lebih sedikit dari kasus lama, maka (bobot kasus lama * s )/sigma w, w tersebut adalah total bobot kasus baru
        //     } elseif ($count_data_kasus_lama < $count_data_kasus_baru) {
        //         foreach ($data_kasus_baru as $index => $kasus_baru) {
        //             $id_gejala_kasus_baru = intval($kasus_baru);

        //             foreach ($data_gejala as $gejala) {
        //                 if ($gejala->id === $id_gejala_kasus_baru) {

        //                     $w = $gejala->bobot;

        //                     foreach ($data_kasus_lama as $kasus_lama) {

        //                         if ($revise->id === $kasus_lama->revise_covid_id && $kasus_lama->gejala_covid_id === $id_gejala_kasus_baru) {

        //                             $s = 1;
        //                             $sw = $s * $w;
        //                             $sigma_sw = $sigma_sw + $sw;
        //                         } else {
        //                             $s = 0;
        //                             $sw = $s * $w;
        //                             $sigma_sw = $sigma_sw + $sw;
        //                         }
        //                     }

        //                     $sigma_w = $sigma_w + $w;
        //                 }
        //             }
        //         }
        //         $result = ($sigma_sw / $sigma_w) * 100;
        //         echo "hasil pembagian adalah ";
        //         echo $result;
        //         echo "<br>";

        //         $array_result[$revise->id] = $result;

        //         foreach ($data_kategori_gejala as $kategori_gejala) {
        //             if ($revise->kategori_gejala_id === $kategori_gejala->id) {
        //                 $array_kategori_gejala[$revise->id] = $kategori_gejala->id;
        //             }
        //         }
        //     }

        //     echo "<br>";
        // }

        // print_r($array_result);
        // echo "<br>";

        // $nilai_max_result = (max($array_result));
        // echo "<br>";
        // $array_id_revise_max = array_keys($array_result, $nilai_max_result);

        // foreach ($array_id_revise_max as $index => $id_revise_result) {
        //     foreach ($array_kategori_gejala as $id_revise_kategori_gejala => $kategori_gejala) {
        //         if ($id_revise_result === $id_revise_kategori_gejala) {
        //             $id_kategori_gejala_baru = $kategori_gejala;
        //         }
        //     }
        // }

        // echo $id_kategori_gejala_baru;






        return view("pages.hasil", [
            'data_revise' => $data_revise,
            'data_gejala' => $data_gejala,
            'data_kasus_lama' => $data_kasus_lama,
            'data_kategori_gejala' => $data_kategori_gejala,
            'data_kasus_baru' => $data_kasus_baru,
            'count_data_kasus_baru' => $count_data_kasus_baru,
            'array_result' => $array_result
        ]);
    }

    public function simpanhasil(Request $request)
    {

        $revise = ReviseCovid::create([
            'kategori_gejala_id' => $request->kategori_gejala_id,
            'persentase_kecocokan' => $request->persentase_kecocokan,
        ]);

        foreach ($request->gejala_id as $gejala) {
            $revise->kasus_covid()->attach(
                $gejala
            );
        }

        return redirect()->route('home.diagnosis')->with('success', 'Terima Kasih Telah Berpartisipasi');
    }

    public function daftardampak()
    {
        $daftar_dampak = DampakCovid::all();

        return view('pages.daftar-dampak', [
            'daftar_dampak' => $daftar_dampak
        ]);
    }

    public function dampak($slug)
    {

        $dampak = DampakCovid::where('slug', $slug)->firstOrFail();

        return view('pages.dampak', [
            'dampak' => $dampak
        ]);
    }
}
