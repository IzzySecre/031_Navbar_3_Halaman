<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'nama_pembeli',
        'laptop_id',
        'jumlah',
        'alamat',
        'status',
    ];

    public function laptop(): BelongsTo
    {
        return $this->belongsTo(Laptop::class);
    }
}