<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_attendance extends Model
{
    protected $fillable = [
        'name', 'email', 'code'
    ];

    public function many_attendance(){
        return $this->hasMany('App\Attendance');
    }

}
