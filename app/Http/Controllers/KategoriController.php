<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        Kategori::create($request->only('nama_kategori'));
        return redirect()->back()->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->only('nama_kategori'));

        return redirect()->back()->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kategori = Kategori::with('beritas')->findOrFail($id);
        
        // Hapus gambar pada berita terkait sebelum menghapus kategori (mencegah file sampah di storage)
        foreach ($kategori->beritas as $berita) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
        }
        
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori dan berita terkait berhasil dihapus.');
    }
}
