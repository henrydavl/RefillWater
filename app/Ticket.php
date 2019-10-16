<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title', 'description', 'submitted_by', 'responded_by', 'is_done'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function submitter() {
        return $this->belongsTo('App\User', 'submitted_by', 'id');
    }

    public function responder() {
        return $this->belongsTo('App\User', 'responded_by', 'id');
    }
}
