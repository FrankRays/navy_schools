<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name','school_id', 'class_id'];

    public function school(){
    	return $this->belongsTo('App\School', 'school_id', 'id');
    }

    public function classes(){
    	return $this->hasMany('App\Classes', 'course_id', 'id');
    }

    public function files(){
    	return $this->hasMany('App\CourseFile', 'course_id', 'id');	
    }
}
