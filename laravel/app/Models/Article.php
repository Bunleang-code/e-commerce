<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author_id'];

    // Author wrote article
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    //  Article has many audiences
    public function audiences()
    {
        return $this->hasMany(Audience::class);
    }

    //  Article has many comments (polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
