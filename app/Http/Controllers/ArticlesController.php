<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct() {

        $this->select = [
            'users.id', 
            'users.name', 
            'users.email',
            'articles.id as aid', 
            'articles.title', 
            'articles.body', 
            'articles.created_at'
        ];
    }

    public function userArticle(Request $request, $id, $aid)
    {        

        // print_r(Articles::find(7));die;

        return view('userArticle', ['id' => $id]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $articles = Articles::select($this->select)
                    ->leftJoin('users', 'articles.uid', '=', 'users.id')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json($articles);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $data = array_merge($request->all(), ['uid' => $request->user()->id]);

        $article = Articles::create($data);

        return response()->json($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show($aid)
    {
        $articles = Articles::select($this->select)
                    ->leftJoin('users', 'articles.uid', '=', 'users.id')
                    ->where('articles.id', $aid)                    
                    ->orderBy('created_at', 'desc')
                    ->first();

        return response()->json($articles);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit(Articles $articles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Articles $articles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }

    public function getArticlesByUserId($id) {

        $articles = Articles::select($this->select)
                    ->leftJoin('users', 'articles.uid', '=', 'users.id')
                    ->where('users.id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json($articles);                    
    }

    public function showLimited($offset, $uid = 0) {

        $limit = 5;

        $articles = Articles::select($this->select)
                    ->leftJoin('users', 'articles.uid', '=', 'users.id')
                    ->orderBy('created_at', 'desc')
                    ->limit($limit)
                    ->offset($offset)
                    ->when($uid, function($query) use ($uid) {
                        return $query->where('users.id', $uid);
                    })
                    ->get();

        return response()->json($articles);
    }
}
