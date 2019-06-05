<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $guarded = [];

    public function threads() {
    return $this->belongsTo('App\Thread');
    }
}
