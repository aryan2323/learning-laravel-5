<?php

namespace App\Http\Controllers;

use App\Article;

use App\Http\Requests\ArticleRequest;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth' , ['only' => 'create']);
    }
    //
    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();
        return view('articles.index', compact('articles' ));

    }

    public function show(Article $article )
    {
//        dd($article->published_at->diffForHumans());

        return view('articles.show' , compact('article'));
    }

    public function create()
    {
        $tags = Tag::pluck('name' , 'id');
        return view('articles.create' , compact('tags'));
        
    }

    public function store(ArticleRequest $request)
    {
//        $article = new Article($request->all());
      $this->createArticle($request);
//        session()->flash('flash_message' , 'Your article has been created');
//        Article::create($request->all());
        flash()->success('Your article has been created')->important();
        return redirect('articles');
//            ->with([
//            'flash_message' => 'Your article has been created' ,
//            'flash_message_important' =>true
//        ]);
    }

    public function edit(Article $article)
    {
        $tags = Tag::pluck('name','id');

        return view('articles.edit' , compact('article' , 'tags'));
    }

    public function update(Article $article ,ArticleRequest $request)
    {
        $article->update($request->all());
        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @param ArticleRequest $request
     */
    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }

    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());
        $this->syncTags($article, $request->input('tag_list'));
        return $article;
    }
}
