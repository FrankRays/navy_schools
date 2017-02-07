<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseFile extends Model
{
    protected $table = 'course_files';
    
    protected $fillable = ['user_id', 'course_id', 'file_path', 'type'];
}
