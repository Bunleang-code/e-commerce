<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Article;
use App\Models\Audience;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'comment' => 'required|string',
            'type' => 'required|in:author,article,audience',
            'target_id' => 'required|integer',
        ]);

        // Create or get user
        $user = User::firstOrCreate(
            ['email' => $request->username . '@mail.com'],
            [
                'name' => $request->username,
                'password' => bcrypt('password')
            ]
        );

        // Resolve polymorphic target
        switch ($request->type) {
            case 'author':
                $target = Author::findOrFail($request->target_id);
                break;
            case 'article':
                $target = Article::findOrFail($request->target_id);
                break;
            case 'audience':
                $target = Audience::findOrFail($request->target_id);
                break;
        }

        $comment = $target->comments()->create([
            'comment' => $request->comment,
            'user_id' => $user->id
        ]);

        return response()->json($comment, 201);
    }

    // GET all comments with target info
    public function index()
    {
        return Comment::with([
            'user',
            'commentable'
        ])->get();
    }
}

