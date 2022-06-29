<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class Blog extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home() {
        $tutorials = DB::table('blogs')
            ->join('categories', 'blogs.category', 'categories.Id')
            ->orderBy('blogs.created_at', 'desc')
            ->limit(10)
            ->get();

        return view('home', ['tutorials' => $tutorials]);
    }

    public function index(Request $req) {
        $title = $req->input('title');
        $category = $req->input('category');

        $tutorials = DB::table('blogs')
            ->join('categories', 'blogs.category', 'categories.Id')
            ->when($title, function ($query, $title) {
                $query->where('blogs.title', 'like', '%' . $title . '%');
            })->when($category, function ($query, $category) {
                $query->where('blogs.category', '=', $category);
            })
            ->paginate(2);

        $categories = (new Category())->index();

        return view(
            'tutorials.index',
            [
                'tutorials' => $tutorials,
                'categories' => $categories
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tutorial = DB::table('blogs')
            ->join('categories', 'blogs.category', 'categories.Id')
            ->leftJoin('users', 'users.Id', 'blogs.author')
            ->where('blogs.Id', '=', $id)
            ->select('blogs.title', 'blogs.content', 'blogs.category', 'categories.name as tut_category', 'blogs.created_at', 'users.username', 'blogs.author_alt_name')
            ->first();

        $related_tuts = DB::table('blogs')
            ->where('blogs.category', '=', $tutorial->category)
            ->select('blogs.Id', 'blogs.title')
            ->get();
        // var_dump($related_tuts);
        // die;
        return view(
            'tutorials.show',
            [
                'tutorial' => $tutorial,
                'related_tuts' => $related_tuts
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
