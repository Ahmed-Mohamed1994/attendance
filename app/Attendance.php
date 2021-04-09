<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable =[
        'code', 'status'
    ];

    public function user_attend(){
        return $this->belongsTo('App\user_attendance','code','code');
    }
}
