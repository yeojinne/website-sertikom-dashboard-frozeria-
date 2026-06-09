<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')

            ->when(request('status') == 'menipis', function ($query) {

                $query->whereColumn(
                    'stok',
                    '<=',
                    'stok_minimum'
                )
                ->where('stok', '>', 0);

            })

            ->when(request('status') == 'habis', function ($query) {

                $query->where('stok', 0);

            })

            ->when(request('search'), function ($query) {

                $query->where(
                    'nama_barang',
                    'like',
                    '%' . request('search') . '%'
                );

            })

            ->when(request('kategori'), function ($query) {

                $query->where(
                    'kategori_id',
                    request('kategori')
                );

            })

            ->latest()
            ->get();

        $kategoris = Kategori::all();

        $totalBarang = Barang::count();

        $totalKategori = Kategori::count();

        $stokMenipis = Barang::whereColumn(
            'stok',
            '<=',
            'stok_minimum'
        )
        ->where('stok', '>', 0)
        ->count();

        $stokHabis = Barang::where(
            'stok',
            0
        )->count();

        return view('dashboard', compact(
            'barangs',
            'kategoris',
            'totalBarang',
            'totalKategori',
            'stokMenipis',
            'stokHabis'
        ));
    }
}