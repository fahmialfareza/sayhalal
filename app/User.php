<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\SocialProvider;
use App\LPH;
use App\HalalCenter;
use App\AuditorHalal;
use App\PenyeliaHalal;
use App\ManagerHalal;
use App\Juleha;
use App\PelakuUsaha;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function socialProviders() {
        return $this->hasOne(SocialProvider::class);
    }

    public function lph() {
        return $this->hasOne(LPH::class);
    }

    public function halal_center() {
        return $this->hasOne(HalalCenter::class);
    }

    public function auditor_halal() {
        return $this->hasOne(AuditorHalal::class);
    }

    public function penyelia_halal() {
        return $this->hasOne(PenyeliaHalal::class);
    }

    public function manager_halal() {
        return $this->hasOne(ManagerHalal::class);
    }

    public function juleha() {
        return $this->hasOne(Juleha::class);
    }

    public function pelaku_usaha() {
        return $this->hasOne(PelakuUsaha::class);
    }
}
