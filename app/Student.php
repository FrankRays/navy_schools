<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [ 'name', 'email', 'photo_url', 'mobile',
                            'barrack_location', 'blood_group', 'serial_number',
                            'po_number', 'rank'];
}
