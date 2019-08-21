<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PelakuUsaha;
use App\Produk;
use App\Restoran;

class Perusahaan extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'perusahaan';

    public function pelaku_usaha() {
        return $this->belongsTo(PelakuUsaha::class);
    }

    public function produk() {
        return $this->hasMany(Produk::class);
    }

    public function restoran() {
        return $this->hasMany(Restoran::class);
    }
}
