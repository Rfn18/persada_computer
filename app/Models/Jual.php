<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jual extends Model
{
    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Kasir::class);
    }

    protected $fillable = [
        'no_bon',
        'kasir_id',
        'discount',
        'total',
        'bayar',
        'kembali',
    ];
}
