<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id', 'name', 'email',
    ];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'registers');
    }
}
