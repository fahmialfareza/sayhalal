<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Province;
use App\District;

class Regency extends Model
{
  public function province() {
    return $this->belongsTo(Province::class);
  }

  public function districts() {
    return $this->hasMany(District::class);
  }
}
