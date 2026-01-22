<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    // commentable: Article | Author | Audience
    public function commentable(){
        return $this->morphTo();
    }

    //user who write comment
    public function user(){
        return $this->belongsTo(User::class);
    }
}
