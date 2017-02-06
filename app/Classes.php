<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name','school_id'];

    public function school(){
    	return $this->belongsTo('App\School', 'school_id', 'id');
    }

    public function course(){
    	return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    public function students(){
    	return $this->hasMany('App\Student', 'class_id', 'id');
    }
}
