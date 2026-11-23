<?php

namespace App\Http\Controllers;

use App\Models\Laptop;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    // Menampilkan form pemesanan untuk laptop tertentu
    public function create(Laptop $laptop)
    {
        return view('pesanan.create', compact('laptop'));
    }

    // Menyimpan data pesanan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pembeli' => 'required|string|max:255',
            'laptop_id' => 'required|exists:laptops,id',
            'jumlah' => 'required|integer|min:1',
            'alamat' => 'required|string',
        ]);

        $pesanan = Pesanan::create($validated);

        return redirect()->route('pesanan.nota', $pesanan)
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    // Menampilkan nota pemesanan
    public function nota(Pesanan $pesanan)
    {
        $pesanan->load('laptop');
        return view('pesanan.nota', compact('pesanan'));
    }

    // Menampilkan daftar semua pesanan
    public function index()
    {
        $pesanan = Pesanan::with('laptop')->latest()->get();
        return view('pesanan.index', compact('pesanan'));
    }

    // Memperbarui status pesanan
    public function updateStatus(Request $request, Pesanan $pesanan)
    {
        $validated = $request->validate([
            'status' => 'required|in:Menunggu,Diproses,Selesai',
        ]);

        $pesanan->update($validated);

        return redirect()->route('pesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui!');
    }
}