<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InstrumenJPH;
use App\User;
use App\AuditorHalal;

class LPH extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'lph';

    public function instrumen() {
        return $this->belongsTo(InstrumenJPH::class);
    }

    public function pengguna() {
        return $this->belongsTo(User::class);
    }

    public function auditor_halal() {
        return $this->hasMany(AuditorHalal::class, 'lph_id');
    }
}
