<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'logo', 'company', 'sector', 'description', 'content', 'image', 'date', 'teacher_name', 'teacher_email', 'mentor_preferences', 'education_level', 'user_id', 'mentor_id', 'school_id'];

    public function users()
    {
   		return $this->belongsToMany(
       		 User::class,
        	'projects_users');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'projects_students', 'project_id', 'student_id')
            ->withTimestamps();
    }
    

}
