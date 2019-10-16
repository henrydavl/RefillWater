<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id', 'bottle_id', 'gallon_id', 'is_auto'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function bottle(){
        return $this->belongsTo('App\Bottle');
    }

    public function gallon(){
        return $this->belongsTo('App\Gallon');
    }
}
