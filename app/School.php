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

    public function labs(){
    	return $this->hasMany('App\Laboratory', 'school_id', 'id');	
    }

    public function staffs(){
        return $this->hasMany('App\Staff', 'school_id', 'id'); 
    }

    public function files(){
        return $this->hasMany('App\File', 'school_id', 'id'); 
    }
}
