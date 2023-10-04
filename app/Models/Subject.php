<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $fillable = [
        'professor_id',
        'subjectcode',
        'name'
    ];
    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class);  
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'subject_user');
    }
}
