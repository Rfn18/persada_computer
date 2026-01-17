<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailJual extends Model
{
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function jual(): belongsTo
    {
        return $this->belongsTo(Jual::class);
    }

    protected $fillable = [
        'jumlah',
        'jual_id',
        'barang_id',
        'jumlah',
        'harga',
        'subtotal',
    ];
}
