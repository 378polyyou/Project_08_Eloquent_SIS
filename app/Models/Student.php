<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Student extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'name', 'email'];

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}
