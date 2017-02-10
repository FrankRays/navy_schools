<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable = ['result_id', 'student_id', 'marks_obtained'];
}
