@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Laptop</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('laptops.update', $laptop) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Laptop</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $laptop->nama) }}" required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Merk</label>
                    <input type="text" name="merk" class="form-control @error('merk') is-invalid @enderror" value="{{ old('merk', $laptop->merk) }}" required>
                    @error('merk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Processor</label>
                    <input type="text" name="processor" class="form-control @error('processor') is-invalid @enderror" value="{{ old('processor', $laptop->processor) }}" required>
                    @error('processor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">RAM (GB)</label>
                    <input type="number" name="ram" class="form-control @error('ram') is-invalid @enderror" value="{{ old('ram', $laptop->ram) }}" required>
                    @error('ram')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Storage (GB)</label>
                    <input type="number" name="storage" class="form-control @error('storage') is-invalid @enderror" value="{{ old('storage', $laptop->storage) }}" required>
                    @error('storage')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga', $laptop->harga) }}" required>
                    @error('harga')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3">{{ old('deskripsi', $laptop->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Laptop</label>
                    @if($laptop->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $laptop->gambar) }}" alt="{{ $laptop->nama }}" style="max-width: 150px;" class="rounded border">
                        </div>
                    @endif
                    <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah gambar</small>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Perbarui</button>
                <a href="{{ route('laptops.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection