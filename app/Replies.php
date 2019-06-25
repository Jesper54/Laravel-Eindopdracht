<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    protected $fillable =
    [
        // Alle columns die mogen worden gevuld met informatie
        'body', 'user_id', 'topic_id'
    ];

    public function user()
    {
    return $this->belongsTo(User::class);
    }

}
