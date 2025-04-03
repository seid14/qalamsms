<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'courseTitle',
        'courseDescription'
    ];

    /**
     * Get the students enrolled in this course.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function enrolledStudents()
    {
        return $this->belongsToMany(Student::class, 'course_student');
    }
}
