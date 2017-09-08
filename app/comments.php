<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    // MASS ASSIGNMENT -------------------------------------------------------
    // define which attributes are mass assignable (for security)
    // we only want these 3 attributes able to be filled
    protected $fillable = array('comment');

    // DEFINE RELATIONSHIPS --------------------------------------------------
    // define a many to many relationship
    // also call the linking table
    public function users() {
        return $this->hasMany('App\User');
    }

    public function posts() {

        return $this->hasMany('App\Posts');
    }
}
