<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GejalaCovidRequest;
use App\Models\GejalaCovid;
use Illuminate\Http\Request;

class GejalaCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = GejalaCovid::all();
        return view('pages.admin.gejala-covid.index', [
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
        return view('pages.admin.gejala-covid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GejalaCovidRequest $request)
    {
        $data = $request->all();
        GejalaCovid::create($data);
        return redirect()->route('gejala-covid.index')->with('success', 'Data berhasil ditambah');
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
        $item = GejalaCovid::findOrFail($id);
        return view('pages.admin.gejala-covid.edit', [
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
    public function update(GejalaCovidRequest $request, $id)
    {
        $data = $request->all();
        $item = GejalaCovid::findOrFail($id);
        $item->update($data);
        return redirect()->route('gejala-covid.index')->with('success', 'Data telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = GejalaCovid::findOrFail($id);
        $item->delete();
        return redirect()->route('gejala-covid.index')
            ->with('success', 'Data telah dihapus');
    }
}
