<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use HasFactory;
    protected $fillable = ['name','biography','photo','youtube_link'];


    public function workouts()
    {
        return $this->hasMany(Workout:: class);
    }
}
