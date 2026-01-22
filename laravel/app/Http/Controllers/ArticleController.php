<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Author;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Create article
    public function store(Request $request)
    {
        $author = Author::where('name', $request->author_name)->firstOrFail();

        return Article::create([
            'name' => $request->title,
            'author_id' => $author->id
        ]);
    }

    // get article by id
    public function show($id)
    {
        return Article::findOrFail($id);
    }

    // Get audiences of an article
    public function audiencesById($id)
    {
        $article = Article::with('audiences')->findOrFail($id);

        return [
            'article_id' => $article->id,
            'article_name' => $article->name,
            'audiences' => $article->audiences
        ];
    }
    
    public function index()
    {
        return Article::with('author')->get();
    }


}
