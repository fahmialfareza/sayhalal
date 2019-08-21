<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InstrumenJPH;
use App\User;
use App\HalalCenter;

class PenyeliaHalal extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'penyelia_halal';

    public function instrumen() {
        return $this->belongsTo(InstrumenJPH::class);
    }

    public function pengguna() {
        return $this->belongsTo(User::class);
    }

    public function halal_center() {
        return $this->belongsTo(HalalCenter::class);
    }
}
