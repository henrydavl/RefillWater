<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallon extends Model
{
    protected $fillable = [
        'id','default_ml', 'current_ml', 'description', 'is_empty', 'nRefill', 'is_on', 'current_request',
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
