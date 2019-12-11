<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'title', 'image_path', 'description', 'start_date', 'end_date', 'price'
    ];

    public function path() {
        return url('/storage/image/' . $this->image_path);
    }
}
