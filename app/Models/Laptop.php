<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'merk',
        'processor',
        'ram',
        'storage',
        'harga',
        'deskripsi',
        'gambar',
    ];

    public function pesanan(): HasMany
    {
        return $this->hasMany(Pesanan::class);
    }
}