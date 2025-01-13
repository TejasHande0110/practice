<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public function scopeActive($query, $student_id){
         return $query->where('student_id', $student_id);
    }

    public function getNametAttribute($value) {
        return ucfirst($value);
    }
    public function SetNameAttribute($value){
        $this->attributes['name'] = ucfirst($value);
    }

    public function SetEmailAttribute($value){
        $this->attributes['email'] = strtolower($value);
    }

    public function SetPassAttribute($value){
        $this->attributes['pass'] = bcrypt($value);
    }
}
