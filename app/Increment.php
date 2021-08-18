<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Increment extends Model
{
    public function employee(){
        return $this->belongsTo(User::class,'employee_id','id');
    }
}
