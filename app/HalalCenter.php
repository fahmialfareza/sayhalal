<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InstrumenJPH;
use App\User;
use App\PenyeliaHalal;

class HalalCenter extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'halal_center';

    public function instrumen() {
        return $this->belongsTo(InstrumenJPH::class);
    }

    public function pengguna() {
        return $this->belongsTo(User::class);
    }

    public function penyelia_halal() {
        return $this->hasMany(PenyeliaHalal::class, 'halal_center_id');
    }
}
