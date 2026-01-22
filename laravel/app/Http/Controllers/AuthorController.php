<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    // Create author + user
    public function store(Request $request)
    {
        $request->validate([
            'author_name' => 'required|string',
            'username' => 'required|string'
        ]);

        $user = User::firstOrCreate(
            ['email' => $request->username . '@mail.com'],
            [
                'name' => $request->username,
                'password' => bcrypt('password')
            ]
        );

        return Author::create([
            'name' => $request->author_name,
            'user_id' => $user->id
        ]);
    }

    // Get all articles of an author
    public function articles($name)
    {
        return Author::where('name', $name)
            ->firstOrFail()
            ->articles;
    }

    // Get all audiences of an author (HasManyThrough)
    public function audiences($name)
    {
        return Author::where('name', $name)
            ->firstOrFail()
            ->audiences;
    }

    public function index()
    {
        return Author::with('user')->get();
    }
}
