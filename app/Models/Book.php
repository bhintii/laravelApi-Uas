<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author_id', 'published_year', 'genre'];

    public static function rules()
    {
        return[
            'title' => 'required|string|max:255',
            'published_year' => 'required|integer|min:1900|max:'.date('Y'),
        ];
    }

    publIc function authors()
    {
        return $this->belongsTo('Author::class','author_id');
    }

}
