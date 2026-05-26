<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Pastikan nanti kamu membuat Model Order jika belum ada

class OrderController extends Controller
{
    // 1. Menampilkan semua daftar pesanan masuk
    public function index()
    {
        // Mengambil semua data pesanan dari database
        $orders = Order::all(); 
        
        // Mengirim data ke halaman resources/views/order/index.blade.php
        return view('order.index', compact('orders'));
    }

    // 2. Menampilkan form untuk membuat pesanan baru
    public function create()
    {
        return view('order.create');
    }

    // 3. Menyimpan data pesanan baru ke database
    public function store(Request $request)
    {
        // Validasi input data dari form
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'nomor_meja'     => 'required|integer',
            'total_harga'    => 'required|numeric',
            'status'         => 'required|string'
        ]);

        // Menyimpan data ke dalam tabel orders
        Order::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'nomor_meja'     => $request->nomor_meja,
            'total_harga'    => $request->total_harga,
            'status'         => $request->status,
        ]);

        // Setelah sukses, kembali ke halaman utama pesanan dengan pesan sukses
        return redirect()->route('order.index')->with('success', 'Pesanan berhasil dibuat!');
    }

    // 4. Menampilkan detail satu pesanan khusus
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('order.show', compact('order'));
    }
}