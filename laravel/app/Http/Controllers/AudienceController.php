<?php

namespace App\Http\Controllers;

use App\Models\Audience;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AudienceController extends Controller
{
    // Create audience + user
    public function store(Request $request)
    {
        $request->validate([
            'audience_name' => 'required|string',
            'username' => 'required|string',
        ]);


        $user = User::firstOrCreate(
            ['email' => $request->username . '@mail.com'],
            [
                'name' => $request->username,
                'password' => bcrypt('password')
            ]
        );

        $audience = Audience::create([
            'name' => $request->audience_name,
            'user_id' => $user->id,
            'article_id' => null
        ]);

        return response()->json([
            'id' => $audience->id,
            'name' => $audience->name,
            'user' => $user->name,
            'created_at' => $audience->created_at
        ], 201);
    }



    // Subscribe audience to article
    public function subscribe(Request $request)
    {
        $request->validate([
            'audience_name' => 'required|string',
            'article_id' => 'required|integer|exists:articles,id'
        ]);

        $audience = Audience::where('name', $request->audience_name)->firstOrFail();
        $article  = Article::findOrFail($request->article_id);

        $audience->article_id = $article->id;
        $audience->save();

        return response()->json([
            'audience' => $audience->name,
            'subscribed_to' => $article->name
        ]);
    }



    // Get all comments of an audience
    public function comments($name)
    {
        return Audience::where('name', $name)
            ->firstOrFail()
            ->comments;
    }

    public function index()
    {
        return Audience::with(['user', 'article'])->get();
    }


    // Get the subscribers group by audience
    public function subscriptionsByAudience()
    {
        return Audience::with('article')
            ->get()
            ->groupBy('name')
            ->map(function ($items, $audienceName) {
                return [
                    'audience' => $audienceName,
                    'articles' => $items->pluck('article.name')->values()
                ];
            })
            ->values();
    }


}
