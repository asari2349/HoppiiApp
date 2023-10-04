<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function Subjects()   
    {
        return $this->hasMany(Subject::class);  
    }
}
