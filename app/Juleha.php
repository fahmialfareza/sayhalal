<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\InstrumenJPH;
use App\User;

class Juleha extends Model
{
    protected $guarded = [
        'id', 'created_at', 'updated_at'
    ];

    protected $table = 'juleha';

    public function instrumen() {
        return $this->belongsTo(InstrumenJPH::class);
    }

    public function pengguna() {
        return $this->belongsTo(User::class);
    }
}
