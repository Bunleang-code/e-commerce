<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id'];

    //  Author has one user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //  Author wrote many articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    //  Author has many comments (polymorphic)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    //  Author has many audiences through articles
    public function audiences()
    {
        return $this->hasManyThrough(
            Audience::class,
            Article::class,
            'author_id',   // FK on articles
            'article_id',  // FK on audiences
            'id',
            'id'
        );
    }
}

