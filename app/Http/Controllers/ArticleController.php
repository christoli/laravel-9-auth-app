<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(15);

        return view('accueil', [
            'articles' => $articles
        ]);
    }

    public function store(Article $article, ArticleRequest $request)
    {
        Article::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Article bien enregistré');
    }

    // Methode pour recuperer un unique article
    public function show($id)
    {
        $article =  Article::find($id);

        return view('articles.show',  [
            'article' => $article
        ]);
    }

    public function edit($id)
    {
        $article =  Article::find($id);

        return view('articles.edit', [
            'article' => $article
        ]);
    }

    public function update(Article $article, ArticleRequest $request)
    {
        // $article contient les donnees initiales de l'article qu'on veut modifier
        // $request contient les donnees recuperees par le formulaire de modification

        $article->titre = $request->titre;
        $article->description = $request->description;

        $article->save();

        return redirect('/accueil')->with('success', 'Article mis a jour');

    }

    public function delete(Article $article)
    {
        $article->delete();
        return redirect('/accueil')->with('success', 'Article supprimé');
    }

    public function mine()
    {
        $myArticles = Article::where('user_id', Auth::id())->get();

        return view('articles.mine', [
            'myArticles' => $myArticles
        ]);
    }
}
