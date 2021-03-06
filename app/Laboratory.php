<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $guarded = ['id','created_at', 'updated_at'];

    public function photos(){
    	return $this->hasMany('App\LabPhoto','lab_id', 'id');
    }

}
