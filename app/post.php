<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_title', 'description',
    ];

    // DEFINE RELATIONSHIPS --------------------------------------------------
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }
}
