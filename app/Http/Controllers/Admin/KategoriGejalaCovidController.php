<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KategoriGejalaCovidRequest;
use App\Models\KategoriGejalaCovid;
use Illuminate\Http\Request;

class KategoriGejalaCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = KategoriGejalaCovid::all();
        return view('pages.admin.kategori-covid.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.kategori-covid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KategoriGejalaCovidRequest $request)
    {
        $data = $request->all();
        KategoriGejalaCovid::create($data);
        return redirect()->route('kategori-covid.index')->with('success', 'Data telah ditambah');
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
    public function edit($id)
    {
        $item = KategoriGejalaCovid::findOrFail($id);
        return view('pages.admin.kategori-covid.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(KategoriGejalaCovidRequest $request, $id)
    {

        $data = $request->all();
        $item = KategoriGejalaCovid::findOrFail($id);
        $item->update($data);
        return redirect()->route('kategori-covid.index')->with('success', 'Data telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = KategoriGejalaCovid::findOrFail($id);
        $item->delete();
        return redirect()->route('kategori-covid.index')
            ->with('success', 'Data telah dihapus');
    }
}
