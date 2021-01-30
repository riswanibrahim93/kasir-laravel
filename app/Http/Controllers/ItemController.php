<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Item;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Item::all();
        return view('databarang', ['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $barang = new Item;
        // $barang->kode = $request->kode;
        // $barang->nama = $request->nama;
        // $barang->harga = $request->harga;
        // $barang->stok = $request->stok;

        // $barang->save();

        // Item::create([
        //     'kode' => $request->kode,
        //     'nama' => $request->nama,
        //     'harga' => $request->harga,
        //     'stok' => $request->stok
        // ]);
        $validated = $request->validate([
            'kode' => 'required|size:3',
            'nama' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ]);
        Item::create($request->all());

        return redirect('/databarang')->with('status', 'Tambah Data Barang Berhasil');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Item::where('kode', $id)
            ->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);
        return redirect('/databarang')->with('update', 'Ubah Data Barang Berhasil');
        // return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::destroy($id);
        return redirect('/databarang')->with('hapus', 'Hapus Data Barang Berhasil');
    }
}
