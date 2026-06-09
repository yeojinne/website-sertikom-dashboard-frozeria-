<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->latest()->get();

        return view('dashboard', compact('barangs'));
    }

    public function create()
    {
        $kategoris = Kategori::all();

        return view('barang.create', compact('kategoris'));
    }

    public function store(Request $request)
{
    $request->validate([
    'kategori_id'   => 'required',
    'nama_barang'   => 'required|max:255',
    'stok'          => 'required|numeric|min:0',
    'stok_minimum'  => 'required|numeric|min:1',
    'satuan'        => 'required',
    'berat'         => 'required|max:255',
    'harga_jual'    => 'required|numeric|min:1',
    'harga_beli'    => 'required|numeric|min:1',
    'lokasi_simpan' => 'required|max:255',
    'deskripsi'     => 'required',
    'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
]);

    $foto = null;

    if($request->hasFile('foto')){
        $foto = $request->file('foto')
                        ->store('barang','public');
    }

    Barang::create([
        'kategori_id'=>$request->kategori_id,
        'nama_barang'=>$request->nama_barang,
        'stok'=>$request->stok,
        'stok_minimum'=>$request->stok_minimum,
        'satuan'=>$request->satuan,
        'harga_jual'=>$request->harga_jual,
        'harga_beli'=>$request->harga_beli,
        'berat'=>$request->berat,
        'lokasi_simpan'=>$request->lokasi_simpan,
        'deskripsi'=>$request->deskripsi,
        'foto'=>$foto
    ]);

    return redirect()
        ->route('dashboard')
        ->with('success','Barang berhasil ditambahkan');
}

    public function show(Barang $barang)
    {
        $barang->load('kategori');

        return view('barang.show', compact('barang'));
    }

    public function edit(Barang $barang)
    {
        $kategoris = Kategori::all();

        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, Barang $barang)
{
    $request->validate([
    'kategori_id'   => 'required',
    'nama_barang'   => 'required|max:255',
    'stok'          => 'required|numeric|min:0',
    'stok_minimum'  => 'required|numeric|min:1',
    'satuan'        => 'required',
    'berat'         => 'required|max:255',
    'harga_jual'    => 'required|numeric|min:1',
    'harga_beli'    => 'required|numeric|min:1',
    'lokasi_simpan' => 'required|max:255',
    'deskripsi'     => 'required',
    'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
]);

    $data = [
        'kategori_id'=>$request->kategori_id,
        'nama_barang'=>$request->nama_barang,
        'stok'=>$request->stok,
        'stok_minimum'=>$request->stok_minimum,
        'satuan'=>$request->satuan,
        'harga_jual'=>$request->harga_jual,
        'harga_beli'=>$request->harga_beli,
        'berat'=>$request->berat,
        'lokasi_simpan'=>$request->lokasi_simpan,
        'deskripsi'=>$request->deskripsi,
    ];

    if($request->hasFile('foto')){

        if($barang->foto){
            Storage::disk('public')->delete($barang->foto);
        }

        $data['foto'] = $request->file('foto')
                                ->store('barang','public');
    }

    $barang->update($data);

   return redirect()
    ->route('dashboard')
    ->with('success','Barang berhasil diperbarui');
}
    public function destroy(Barang $barang)
{
    $barang->delete();

    return redirect()
        ->route('dashboard')
        ->with(
            'success',
            'Barang berhasil dihapus'
        );
}
}