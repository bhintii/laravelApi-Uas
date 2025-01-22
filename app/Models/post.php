<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'autor',
        'image',
        'page',
        'content',
        'status',
    ];
    publIc function comments()
    {
        return $this->hasMany('Comment::class');
    }

    
    
}
