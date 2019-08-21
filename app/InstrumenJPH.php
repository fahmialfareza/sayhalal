<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\LPH;
use App\HalalCenter;
use App\AuditorHalal;
use App\PenyeliaHalal;
use App\ManagerHalal;
use App\Juleha;

class InstrumenJPH extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'instrumen_jph';

    public function lph() {
        return $this->hasMany(LPH::class);
    }

    public function halal_center() {
        return $this->hasMany(HalalCenter::class);
    }

    public function auditor_halal() {
        return $this->hasMany(AuditorHalal::class);
    }

    public function penyelia_halal() {
        return $this->hasMany(PenyeliaHalal::class);
    }

    public function manager_halal() {
        return $this->hasMany(ManagerHalal::class);
    }

    public function juleha() {
        return $this->hasMany(Juleha::class);
    }
}
