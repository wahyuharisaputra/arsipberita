<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalKategori = Kategori::count();
        $beritaTerbaru = Berita::with('kategori')->latest('tanggal_berita')->take(5)->get();

        return view('admin.dashboard', compact('totalBerita', 'totalKategori', 'beritaTerbaru'));
    }
}
