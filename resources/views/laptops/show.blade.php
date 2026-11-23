@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @if($laptop->gambar)
            <img src="{{ asset('storage/' . $laptop->gambar) }}" class="img-fluid rounded mb-3" style="max-height: 300px; object-fit: contain; width: 100%; background-color: #f8f9fa;" alt="{{ $laptop->nama }}">            @endif
            <h2>{{ $laptop->nama }}</h2>
            <p>
                <strong>Merk:</strong> {{ $laptop->merk }}<br>
                <strong>Processor:</strong> {{ $laptop->processor }}<br>
                <strong>RAM:</strong> {{ $laptop->ram }} GB<br>
                <strong>Storage:</strong> {{ $laptop->storage }} GB<br>
                <strong>Harga:</strong> Rp{{ number_format($laptop->harga, 0, ',', '.') }}
            </p>
            <p>{{ $laptop->deskripsi }}</p>

            <a href="{{ route('pesanan.create', $laptop) }}" class="btn btn-primary">Pesan Sekarang</a>
            <a href="{{ route('laptops.index') }}" class="btn btn-secondary">Kembali ke Katalog</a>
        </div>
    </div>
@endsection