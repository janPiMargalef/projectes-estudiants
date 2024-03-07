<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'logo', 'company', 'sector', 'description', 'budget', 'date', 'user_id'];

    public function users()
    {
   		return $this->belongsToMany(
       		 User::class,
        	'projects_users');
    }

}
 