<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'class_id',
    ];

    public function classnames() {

        return $this->belongsTo(StudentClass::class, 'class_id');
    }
}
