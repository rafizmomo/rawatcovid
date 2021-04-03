<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GejalaCovid;
use App\Models\KasusCovid;
use App\Models\KategoriGejalaCovid;
use App\Models\ReviseCovid;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        // $gejala_ringan = KasusCovid::select('gejala_id')->where('kategori_gejala_id', 1)->get()->count();
        // $gejala_sedang = KasusCovid::select('gejala_id')->where('kategori_gejala_id', 2)->get()->count();
        // $gejala_berat = KasusCovid::select('gejala_id')->where('kategori_gejala_id', 3)->get()->count();

        $total_kategori_gejala = KategoriGejalaCovid::count();
        $total_gejala = GejalaCovid::count();
        $total_kasus = ReviseCovid::count();

        try {
            $api_kawal_covid = Http::get('https://api.kawalcorona.com/indonesia')->json();
        } catch (Exception $exc) {
            $api_kawal_covid = [];
        }
        return view('pages.admin.dashboard.index', [
            'api_kawal_covid' => $api_kawal_covid,
            'total_kategori_gejala' => $total_kategori_gejala,
            'total_gejala' => $total_gejala,
            'total_kasus' => $total_kasus
        ]);
    }
}
