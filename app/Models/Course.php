<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_code', 'name', 'credits', 'teacher_id',
    ];

    //หลายๆคอร์สสามารถมีครูคนเดียว
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);//
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'registers');
    }
}
