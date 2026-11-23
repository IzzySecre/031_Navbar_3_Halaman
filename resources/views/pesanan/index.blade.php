@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Detail Pemesanan</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Laptop</th>
                <th>Jumlah</th>
                <th>Alamat</th>
                <th>Status</th>
                <th>Tanggal Pesan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pesanan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_pembeli }}</td>
                    <td>{{ $item->laptop->nama }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>
                        <form action="{{ route('pesanan.updateStatus', $item) }}" method="POST" class="d-flex gap-2">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="Menunggu" {{ $item->status == 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                                <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </form>
                    </td>
                    <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                    <td>
                        <a href="{{ route('pesanan.nota', $item) }}" class="btn btn-outline-primary btn-sm" target="_blank">🖨️ Cetak</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Belum ada pesanan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection