<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallon extends Model
{
    protected $fillable = [
        'default_ml', 'current_ml', 'description', 'is_empty'
    ];

    public $incrementing = false;

    protected $keyType = 'string';

    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
