<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DampakCovidRequest;
use App\Models\DampakCovid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class DampakCovidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DampakCovid::all();
        return view('pages.admin.dampak-covid.index', [
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
        return view('pages.admin.dampak-covid.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DampakCovidRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/img/dampak',
            'public'
        );


        DampakCovid::create($data);
        return redirect()->route('dampak-covid.index')->with('success', 'Data berhasil ditambah');
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
        $item = DampakCovid::findOrFail($id);
        return view('pages.admin.dampak-covid.edit', [
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
    public function update(DampakCovidRequest $request, $id)
    {
        $item = DampakCovid::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $namafile = $item->gambar;

        if ($request->gambar != null) {
            if (File::exists('storage/' . $namafile)) {

                File::delete('storage/' . $namafile);
            } else {

                dd('File does not exists.' . $namafile);
            }

            $data['gambar'] = $request->file('gambar')->store(
                'assets/img/dampak',
                'public'
            );
            $item->update($data);
        } else {
            $item->update([
                'title' =>  $request->input('title', $item->name),
                'slug' => $data['slug'],
                'keterangan' => $request->input('keterangan', $item->keterangan),
            ]);
        }

        return redirect()->route('dampak-covid.index')->with('success', 'Data telah diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = DampakCovid::findOrFail($id);

        $namafile = $item->gambar;

        if (File::exists('storage/' . $namafile)) {

            File::delete('storage/' . $namafile);
        }
        $item->delete();

        return redirect()->route('dampak-covid.index')
            ->with('success', 'Data telah dihapus');
    }
}
