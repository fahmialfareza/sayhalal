<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perusahaan;

class Produk extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'produk';

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class);
    }
}
