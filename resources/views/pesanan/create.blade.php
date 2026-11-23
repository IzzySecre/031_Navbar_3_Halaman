@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Form Pemesanan</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Laptop:</strong> {{ $laptop->nama }}</p>
            <p><strong>Harga:</strong> Rp{{ number_format($laptop->harga, 0, ',', '.') }}</p>

            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf
                <input type="hidden" name="laptop_id" value="{{ $laptop->id }}">

                <div class="mb-3">
                    <label class="form-label">Nama Pembeli</label>
                    <input type="text" name="nama_pembeli" class="form-control @error('nama_pembeli') is-invalid @enderror" value="{{ old('nama_pembeli') }}" required>
                    @error('nama_pembeli')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror" min="1" value="{{ old('jumlah', 1) }}" required>
                    @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat Pengiriman</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="3" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Kirim Pesanan</button>
                <a href="{{ route('laptops.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection