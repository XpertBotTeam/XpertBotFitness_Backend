<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;
       public function users()
       {
        return $this->belongsToMany(User::class);
       }
    public fumction workout(){
        return $this->belongsTo(Workout::class);
    }
}
