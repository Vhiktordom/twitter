<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $articles = Article::all();
        // $articles = Article::whereLive(1)->get();

          //$articles = Article::withTrashed()->paginate(10);
          //$articles = Article::onlyTrashed()->paginate(10);
         $articles = Article::paginate(10);
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $article = new Article;
        // $article->user_id = Auth::user()->id;
        // $article->content = $request->content;
        // $article->live = (boolean)$request->live;
        // $article->post_on = $request->post_on;

        // $article->save();

       $confirm =  Article::create($request->all());
       return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findorFail($id);
        return view('articles.show', compact('article'));

    }

    
    public function edit($id)
    {
        $article = Article::findorFail($id);
        return view('articles.edit', compact('article'));
    }

    
    public function update(Request $request, $id)
    {
         $article = Article::findorFail($id);
            if(!isset($request->live)){
                $article->update(array_merge($request->all(), ['live' => false]));
            }
         $article->update($request->all());
         return redirect('/articles');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $article = Article::findorFail($id);
        // $article->delete();

        Article::destroy($id);

        return redirect('/articles');
    }

    public function restore($id)
    {
        $article = Article::findorFail($id);
        $article->restore();
        $article->forceDelete();
    }
}
