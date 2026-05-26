<?php

namespace App\Http\Controllers;

use App\Models\Meja;
use Illuminate\Http\Request;

class MejaController extends Controller
{
    public function index()
    {
        $mejas = Meja::all();
        return view('meja.index', compact('mejas'));
    }

    public function create()
    {
        return view('meja.create');
    }

    public function store(Request $request)
    {
        Meja::create($request->all());

        return redirect('/meja')
            ->with('success', 'Data meja berhasil ditambahkan');
    }

    public function edit($id)
    {
        $meja = Meja::findOrFail($id);

        return view('meja.edit', compact('meja'));
    }

    public function update(Request $request, $id)
    {
        $meja = Meja::findOrFail($id);

        $meja->update($request->all());

        return redirect('/meja')
            ->with('success', 'Data meja berhasil diupdate');
    }

    public function destroy($id)
    {
        $meja = Meja::findOrFail($id);

        $meja->delete();

        return redirect('/meja')
            ->with('success', 'Data meja berhasil dihapus');
    }
}