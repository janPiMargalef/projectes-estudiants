<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public function projectsUsers()
{
    return $this->belongsToMany(Project::class, 'projects_users')
                ->withPivot('type')
                ->withTimestamps();
}

    public function projects()
{
    return $this->hasMany(Project::class);
}

public function mentor()
{
    return $this->hasOne(Mentor::class);
}

public function student()
{
    return $this->hasOne(Student::class);
}

public function mentors()
{
    return $this->belongsToMany(Mentor::class)->withTimestamps();
}


public function getUserTypeAttribute()
{
    if ($this->student()->exists()) {
        return 'student';
    } elseif ($this->mentor()->exists()) {
        return 'mentor';
    }
    return 'general'; // Un tipo por defecto, si es necesario
}


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
