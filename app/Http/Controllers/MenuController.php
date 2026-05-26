<?php

namespace App\Http\Controllers;

use App\Models\Menu; // Jangan lupa panggil model Menu di sini
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * 1. Menampilkan semua daftar menu (Untuk Kasir / Pelanggan)
     */
    public function index()
    {
        // Mengambil semua data dari tabel menus
        $menus = Menu::all(); 
        
        // Mengirim data ke halaman view di folder resources/views/menu/index.blade.php
        return view('menu.index', compact('menus'));
    }

    /**
     * 2. Menampilkan halaman form tambah menu baru (Untuk Admin)
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * 3. Menyimpan data menu baru dari form ke database
     */
    public function store(Request $request)
    {
        // Validasi inputan form agar data wajib diisi dan sesuai tipe data
        $request->validate([
            'nama_menu' => 'required|string|max:150',
            'kategori'  => 'required|in:makanan,minuman,snack',
            'harga'     => 'required|numeric',
            'deskripsi' => 'nullable|string',
        ]);

        // Menyimpan data ke database menggunakan Model Menu
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori'  => $request->kategori,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status'    => 'tersedia', // Otomatis diset tersedia saat pertama buat
        ]);

        // Mengembalikan user ke halaman utama menu dengan pesan sukses
        return redirect()->route('menu.index')->with('success', 'Menu baru berhasil ditambahkan!');
    }

    /**
     * 4. Menampilkan detail satu menu saja (Opsional, jika dibutuhkan)
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
        // Cari data menu berdasarkan ID, jika tidak ketemu otomatis error 404
        $menu = Menu::findOrFail($id);
        
        return view('menu.edit', compact('menu'));
    }

    /**
     * 6. Menyimpan perubahan data menu yang telah diedit
     */
    public function update(Request $request, string $id)
    {
        // Validasi inputan edit
        $request->validate([
            'nama_menu' => 'required|string|max:150',
            'kategori'  => 'required|in:makanan,minuman,snack',
            'harga'     => 'required|numeric',
            'deskripsi' => 'nullable|string',
            'status'    => 'required|in:tersedia,habis',
        ]);

        $menu = Menu::findOrFail($id);
        
        // Update data di database
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'kategori'  => $request->kategori,
            'harga'     => $request->harga,
            'deskripsi' => $request->deskripsi,
            'status'    => $request->status,
        ]);

        return redirect()->route('menu.index')->with('success', 'Data menu berhasil diperbarui!');
    }

    /**
     * 7. Menghapus menu dari database
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete(); // Hapus data

        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }
}