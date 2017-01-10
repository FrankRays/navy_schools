<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name'];


    public function classes(){
    	return $this->hasMany('App\Classes', 'school_id', 'id');
    }

    public function courses(){
    	return $this->hasMany('App\Course', 'school_id', 'id');
    }
}
