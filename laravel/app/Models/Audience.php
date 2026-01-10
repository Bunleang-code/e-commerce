<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory

class Audience extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'article_id', 'uers_id'];

    // Audience has one user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Audience belongs to article
    public function aricles(){
        return $this->belongsTo(Article::class);
    }

    //Audience has many comments (polymorphic)
    public function comments(){
        return $this->morphMany(Comment::class), 'commentable';
    }
}
