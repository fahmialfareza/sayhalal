<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Country;
use App\Regency;

class Province extends Model
{
  public function country() {
    return $this->belongsTo(Country::class);
  }

  public function regencies() {
    return $this->hasMany(Regency::class);
  }
}
