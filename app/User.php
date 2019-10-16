<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','balance','role_id','token','is_verified','is-active','is_login'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() {
        return $this->belongsTo('App\Role');
    }

    public function tickets() {
        return $this->hasMany('App\Ticket');
    }

    public function bottles() {
        return $this->hasMany('App\Bottle');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }

    public function topups() {
        return $this->hasMany('App\TopUp');
    }
}
