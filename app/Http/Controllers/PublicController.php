<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Berita;
use App\Models\Kategori;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::with('kategori')->latest('tanggal_berita');

        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->input('kategori'));
        }

        if ($request->filled('tahun')) {
            $query->whereYear('tanggal_berita', $request->input('tahun'));
        }

        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('judul', 'like', '%'.$request->input('q').'%')
                  ->orWhere('isi_berita', 'like', '%'.$request->input('q').'%');
            });
        }

        $beritas = $query->paginate(9)->withQueryString();
        $kategoris = Kategori::all();
        $tahunList = Berita::selectRaw('YEAR(tanggal_berita) as tahun')->distinct()->orderBy('tahun', 'desc')->pluck('tahun');

        return view('public.home', compact('beritas', 'kategoris', 'tahunList'));
    }

    public function show($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);
        return view('public.show', compact('berita'));
    }
}
