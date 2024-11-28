<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controllers\Middleware;

class ArticleController extends Controller
{
    public static function middleware()
    {
        //proteggi tutte le funzioni di questo controller col Middleware auth
        // return [
        //     new Middleware('auth', except: ['index', 'show'])
        // ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view("articles.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("articles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
           $article= Article::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'body' => $request->body,
                'image' => $request->has('cover') ? $request->file('cover')->store('cover', 'public') : 'media/images.png',
                'user_id' => Auth::user()->id //FUNZIONA PERCHE' C'E' IL MIDDLEWARE (per non avere l'errore Auth::user() == null)
            ]);

            $article->categories()->attach($request->categories);
            $article->countries()->attach($request->countries);
            return redirect()->route('create.articles')->with('success', 'Articolo creato correttamente');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'body' => $request->body,
        ]);
        if ($request->has('image')) {
            $article->update([
                'image' => $request->file('img')->store('cover', 'public')
            ]);
        }
        $article->categories()->sync($request->categories);
        return redirect()->route('article.edit', compact('article'))->with('success', "Articolo '" . $article->title . "' modificato");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if ($article->categories->count() > 0) {
            $article->categories()->detach($article->category);
        }
        $article->delete();
        return redirect()->route('welcome')->with('success', 'Articolo cancellato');
    }
    
}
