<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Transaction extends Model
{
    //
    public function getCreatedAtAttribute($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d M Y');
    }

    public function scopeActive($query, $student_id){
        return $query->where('student_id', $student_id);
   }

     
}
