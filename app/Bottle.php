<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    protected $fillable = [
        'capacity', 'price','user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction');
    }
}
