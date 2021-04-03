<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KasusCovidRequest;
use App\Models\GejalaCovid;
use App\Models\KasusCovid;
use App\Models\KategoriGejalaCovid;
use App\Models\ReviseCovid;
use Illuminate\Http\Request;

class KasusCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ReviseCovid::with([
            'kategori_gejala_covid'
        ])->get();

        $kasus_covid = KasusCovid::with([
            'revise_covid', 'gejala_covid'
        ])->get();

        return view('pages.admin.kasus-covid.index', [
            'items' => $items,
            'kasus_covid' => $kasus_covid
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kasus-covid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $revise = ReviseCovid::create([
            'kategori_gejala_id' => $request->kategori_gejala_id,
            'persentase_kecocokan' => $request->persentase_kecocokan,
        ]);

        foreach ($request->banyak as $gejala) {
            $revise->kasus_covid()->attach(
                $gejala['gejala_covid_id']
            );
        }


        return redirect()->route('kasus-covid.index')->with('success', 'Data berhasil ditambah');
    }

    public function destroy($id)
    {
        $item = ReviseCovid::findOrFail($id);

        $data = KasusCovid::where('revise_covid_id', '=', $id);

        $data->delete();
        $item->delete();
        return redirect()->route('kasus-covid.index')
            ->with('success', 'Data telah dihapus');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $item = KasusCovid::findOrFail($id);
    //     $gejala_covid = GejalaCovid::all();
    //     $kategori_gejala_covid = KategoriGejalaCovid::all();
    //     return view('pages.admin.kasus-covid.edit', [
    //         'item' => $item,
    //         'kategori_gejala_covid' => $kategori_gejala_covid,
    //         'gejala_covid' => $gejala_covid
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(KasusCovidRequest $request, $id)
    // {
    //     $item = KasusCovid::findOrFail($id);
    //     $data = $request->all();
    //     $item->update($data);
    //     return redirect()->route('kasus-covid.index')->with('success', 'Data telah diperbaharui');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
