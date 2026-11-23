@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Kelola Katalog</h2>
        <a href="{{ route('laptops.create') }}" class="btn btn-success">+ Tambah Laptop</a>
    </div>

    @if($laptops->isEmpty())
        <div class="text-center py-5">
            <p class="text-muted fs-5">Belum ada laptop yang tersedia.</p>
        </div>
    @else
        <div class="row">
            @foreach($laptops as $laptop)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($laptop->gambar)
                            <img src="{{ asset('storage/' . $laptop->gambar) }}" class="card-img-top p-2" style="height: 180px; object-fit: contain; background-color: #f8f9fa;" alt="{{ $laptop->nama }}">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center" style="height: 180px;">
                                <span class="text-muted">Tidak ada gambar</span>
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $laptop->nama }}</h5>
                            <p class="card-text">
                                <strong>Merk:</strong> {{ $laptop->merk }}<br>
                                <strong>Processor:</strong> {{ $laptop->processor }}<br>
                                <strong>RAM:</strong> {{ $laptop->ram }} GB<br>
                                <strong>Storage:</strong> {{ $laptop->storage }} GB<br>
                                <strong>Harga:</strong> Rp{{ number_format($laptop->harga, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('laptops.show', $laptop) }}" class="btn btn-outline-primary btn-sm">Detail</a>
                            <div>
                                <a href="{{ route('laptops.edit', $laptop) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('laptops.destroy', $laptop) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus laptop ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection