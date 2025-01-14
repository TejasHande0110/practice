<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class Student extends Model implements Authenticatable
{
    //
    use HasFactory, AuthenticatableTrait;
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
