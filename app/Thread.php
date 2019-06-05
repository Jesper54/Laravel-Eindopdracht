<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

    public function topic()
    {
        return $this->hasMany('App\Topic');
    }
}
