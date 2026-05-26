<?php

namespace App\Http\Controllers;

use App\Models\Menu; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk fungsi hapus foto lama nanti

class MenuController extends Controller
{
    /**
     * 1. Menampilkan semua daftar menu
     */
    public function index()
    {
        $menus = Menu::all(); 
        return view('menu.index', compact('menus'));
    }

    /**
     * 2. Menampilkan halaman form tambah menu baru
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * 3. Menyimpan data menu baru + UPLOAD FOTO ke database
     */
    public function store(Request $request)
    {
        // Validasi inputan form termasuk file foto
        $request->validate([
            'nama_menu' => 'required|string|max:150',
            'kategori'  => 'required|in:makanan,minuman,snack',
            'harga'     => 'required|numeric',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Batasi maks 2MB
            'deskripsi' => 'nullable|string',
        ]);

        $namaFoto = null;

        // Proses upload file foto jika user memasukkan gambar
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalName();
            // Menyimpan gambar ke folder public/images/menu
            $file->move(public_path('images/menu'), $namaFoto);
        }

        // Menyimpan semua data ke database
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori'  => $request->kategori,
            'harga'     => $request->harga,
            'foto'      => $namaFoto, // Masukkan nama file foto ke database
            'deskripsi' => $request->deskripsi,
            'status'    => 'tersedia', 
        ]);

        return redirect()->route('menu.index')->with('success', 'Menu baru berhasil ditambahkan!');
    }

    /**
     * 4. Menampilkan detail satu menu (Opsional)
     */
    public function show(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.show', compact('menu'));
    }

    /**
     * 5. Menampilkan halaman form edit/ubah data menu
     */
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        return view('menu.edit', compact('menu'));
    }

    /**
     * 6. Menyimpan perubahan data menu + UPDATE FOTO LAMA
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:150',
            'kategori'  => 'required|in:makanan,minuman,snack',
            'harga'     => 'required|numeric',
            'foto'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status'    => 'required|in:tersedia,habis',
        ]);

        $menu = Menu::findOrFail($id);
        $namaFoto = $menu->foto; // Ambil nama foto lama bawaan database

        // Jika user mengunggah foto baru saat edit
        if ($request->hasFile('foto')) {
            // Hapus file foto lama di folder public agar storage tidak penuh
            if ($menu->foto && File::exists(public_path('images/menu/' . $menu->foto))) {
                File::delete(public_path('images/menu/' . $menu->foto));
            }

            // Upload foto baru yang diganti
            $file = $request->file('foto');
            $namaFoto = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/menu'), $namaFoto);
        }

        // Update data baru ke database
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'kategori'  => $request->kategori,
            'harga'     => $request->harga,
            'foto'      => $namaFoto, // Simpan foto baru/lama
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ]);

        return redirect()->route('menu.index')->with('success', 'Data menu berhasil diperbarui!');
    }

    /**
     * 7. Menghapus menu dari database beserta file fotonya
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        // Hapus file fisiknya di folder public sebelum datanya dihapus dari database
        if ($menu->foto && File::exists(public_path('images/menu/' . $menu->foto))) {
            File::delete(public_path('images/menu/' . $menu->foto));
        }

        $menu->delete(); 

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}