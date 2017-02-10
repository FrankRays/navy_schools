<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = ['class_id', 'file_path', 'subject', 'full_marks'];

    protected $with = ['marks'];

    public function marks(){
    	return $this->hasMany('App\Mark', 'result_id', 'id');
    }
}
