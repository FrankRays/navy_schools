<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['user_id','file_path','type'];

    public function user(){
    	return $this->belongsTo('User','user_id','id');
    }
}
