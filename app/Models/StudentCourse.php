<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentCourse extends Model
{
    use HasFactory;

    protected $fillable= [
        'studentId',
        'courseId',
        'mark'
    ];

    public function student()
    {
       return $this->belongsTo(Student::class,'studentId','id');
    }

    public function course()
    {
       return $this->belongsTo(Course::class,'courseId','id');
    }
}
