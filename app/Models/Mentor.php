<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = ['motivation', 'expertise', 'company', 'career_summary', 'linkedin', 'user_id'];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function users()
{
    return $this->belongsToMany(User::class)->withTimestamps();
}


}

