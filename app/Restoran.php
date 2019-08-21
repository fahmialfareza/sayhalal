<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Perusahaan;

class Restoran extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'restoran';

    public function perusahaan() {
        return $this->belongsTo(Perusahaan::class);
    }
}
