<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    public function Coach()
    {
          return $this->belongsTo(Coach::class);
    }
    public function exercises(){
    return $this->hasMany(Exercises::class);
    }
}
