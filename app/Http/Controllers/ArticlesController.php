<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return response()->json(Articles::orderBy('created_at', 'desc')->get());

        $select = [
            'users.id', 
            'users.name', 
            'users.email', 
            'articles.title', 
            'articles.body', 
            'articles.created_at'
        ];

        $articles = Articles::select($select)
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
    public function show(Articles $articles)
    {
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

        $select = [
            'users.id', 
            'users.name', 
            'users.email', 
            'articles.title', 
            'articles.body', 
            'articles.created_at'
        ];

        $articles = Articles::select($select)
                    ->leftJoin('users', 'articles.uid', '=', 'users.id')
                    ->where('users.id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return response()->json($articles);                    
    }
}
