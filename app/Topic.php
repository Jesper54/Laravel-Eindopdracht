<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $guarded = [];

    public function threads() {
        return $this->belongsTo('App\Thread');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    protected $fillable =
    [
        // mag gevuld worden met informatie in de database
        'title', 'user_id', 'thread_id', 'body'
    ];

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }
}
