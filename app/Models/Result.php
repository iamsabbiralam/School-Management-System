<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'subject_id',
        'marks',
        'class_id',
    ];

    public function students() {

        return $this->belongsTo(Student::class, "student_id");
    }

    public function subjects() {

        return $this->belongsTo(Subject::class, "subject_id");
    }

    public function classesname() {

        return $this->belongsTo(StudentClass::class, "class_id");
    }
}
