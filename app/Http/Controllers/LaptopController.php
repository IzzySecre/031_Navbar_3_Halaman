<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use Illuminate\Http\Request;

class LaptopController extends Controller
{
    // Menampilkan semua laptop (Katalog)
    public function index()
    {
        $laptops = Laptop::all();
        return view('laptops.index', compact('laptops'));
    }

    // Menampilkan detail 1 laptop
    public function show(Laptop $laptop)
    {
        return view('laptops.show', compact('laptop'));
    }

    // Menampilkan form tambah laptop
    public function create()
    {
        return view('laptops.create');
    }

    // Menyimpan laptop baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|integer|min:1',
            'storage' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('laptops', 'public');
        }

        Laptop::create($validated);

        return redirect()->route('laptops.index')
            ->with('success', 'Laptop berhasil ditambahkan!');
    }

    // Menampilkan form edit laptop
    public function edit(Laptop $laptop)
    {
        return view('laptops.edit', compact('laptop'));
    }

    // Memperbarui data laptop
    public function update(Request $request, Laptop $laptop)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'merk' => 'required|string|max:255',
            'processor' => 'required|string|max:255',
            'ram' => 'required|integer|min:1',
            'storage' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama kalau ada
            if ($laptop->gambar) {
                \Storage::disk('public')->delete($laptop->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('laptops', 'public');
        }

        $laptop->update($validated);

        return redirect()->route('laptops.index')
            ->with('success', 'Laptop berhasil diperbarui!');
    }

    // Menghapus laptop
    public function destroy(Laptop $laptop)
    {
        $laptop->delete();

        return redirect()->route('laptops.index')
            ->with('success', 'Laptop berhasil dihapus!');
    }

    // Menampilkan halaman kelola katalog (Beranda)
    public function manage()
    {
        $laptops = Laptop::all();
        return view('laptops.manage', compact('laptops'));
    }
}