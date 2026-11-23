@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4 no-print">
        <h2 class="mb-0">Nota Pemesanan</h2>
        <div>
            <button onclick="window.print()" class="btn btn-primary">🖨️ Cetak Nota</button>
            <a href="{{ route('laptops.index') }}" class="btn btn-secondary">Kembali ke Katalog</a>
        </div>
    </div>

    <div class="card mx-auto" style="max-width: 500px;" id="nota">
        <div class="card-body">
            <div class="text-center mb-4">
                <h3 class="mb-0">Laptop Store</h3>
                <small class="text-muted">Nota Pemesanan</small>
            </div>

            <table class="table table-borderless mb-0">
                <tr>
                    <td width="40%"><strong>No. Pesanan</strong></td>
                    <td>: #{{ str_pad($pesanan->id, 5, '0', STR_PAD_LEFT) }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal</strong></td>
                    <td>: {{ $pesanan->created_at->format('d-m-Y H:i') }}</td>
                </tr>
                <tr>
                    <td><strong>Nama Pembeli</strong></td>
                    <td>: {{ $pesanan->nama_pembeli }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>: {{ $pesanan->alamat }}</td>
                </tr>
                <tr>
                    <td><strong>Status</strong></td>
                    <td>: {{ $pesanan->status }}</td>
                </tr>
            </table>

            <hr>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>Laptop</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Harga</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $pesanan->laptop->nama }}</td>
                        <td class="text-center">{{ $pesanan->jumlah }}</td>
                        <td class="text-end">Rp{{ number_format($pesanan->laptop->harga, 0, ',', '.') }}</td>
                        <td class="text-end">Rp{{ number_format($pesanan->laptop->harga * $pesanan->jumlah, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <div class="d-flex justify-content-between">
                <strong>Total</strong>
                <strong>Rp{{ number_format($pesanan->laptop->harga * $pesanan->jumlah, 0, ',', '.') }}</strong>
            </div>

            <div class="text-center mt-4">
                <small class="text-muted">Terima kasih telah berbelanja di Laptop Store!</small>
            </div>
        </div>
    </div>

    <style>
        @media print {
            .no-print, nav, .navbar {
                display: none !important;
            }
            #nota {
                border: none !important;
                box-shadow: none !important;
            }
            body {
                background: white !important;
            }
        }
    </style>
@endsection