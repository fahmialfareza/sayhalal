<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InstrumenJPH;
use App\User;
use App\LPH;

class AuditorHalal extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'auditor_halal';

    public function instrumen() {
        return $this->belongsTo(InstrumenJPH::class);
    }

    public function pengguna() {
        return $this->belongsTo(User::class);
    }

    public function lph() {
        return $this->belongsTo(LPH::class);
    }
}
