<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Perusahaan;

class PelakuUsaha extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'pelaku_usaha';

    public function pengguna() {
        return $this->belongsTo(User::class);
    }

    public function perusahaan() {
        return $this->hasOne(Perusahaan::class);
    }
}
