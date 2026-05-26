<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan_Restoran; // Mengimpor model

class PelangganRestoranController extends Controller
{
    public function index(Request $request)
    {
        // Menangkap input pencarian
        $search = $request->input('search');

        // Mengambil data dengan kondisi pencarian
        $pelanggan = Pelanggan_Restoran::when($search, function ($query) use ($search) {
            return $query->where('nama_pelanggan', 'like', '%' . $search . '%')
                         ->orWhere('nomor_hp', 'like', '%' . $search . '%');
        })->get();

        return view('pelanggan.index', compact('pelanggan', 'search'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required',
        ]);

        Pelanggan_Restoran::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Data pelanggan berhasil ditambah!');
    }

    // Tambahkan fungsi untuk menampilkan halaman edit
    public function edit($id)
    {
        $pelanggan = \App\Models\Pelanggan_Restoran::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    // Tambahkan fungsi untuk menyimpan perubahan
    public function update(Request $request, $id)
    {
        $pelanggan = \App\Models\Pelanggan_Restoran::findOrFail($id);
        $pelanggan->update($request->all());
        return redirect('/pelanggan')->with('success', 'Data berhasil diupdate!');
    }

    // Tambahkan fungsi untuk menghapus data
    public function destroy($id)
    {
        $pelanggan = \App\Models\Pelanggan_Restoran::findOrFail($id);
        $pelanggan->delete();
        return redirect('/pelanggan')->with('success', 'Data berhasil dihapus!');
    }
}