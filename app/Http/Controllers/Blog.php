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
            ->where('blogs.is_deleted', '=', 0)
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

    public function adminIndex(Request $req) {
        $title = $req->input('title');
        $category = $req->input('category');

        $tutorials = DB::table('blogs')
            ->join('categories', 'blogs.category', 'categories.Id')
            ->leftJoin('users', 'blogs.author', 'users.Id')
            ->when($title, function ($query, $title) {
                $query->where('blogs.title', 'like', '%' . $title . '%');
            })->when($category, function ($query, $category) {
                $query->where('blogs.category', '=', $category);
            })
            ->where('blogs.is_deleted', '=', 0)
            ->select('blogs.Id', 'blogs.title', 'categories.name as tut_category', 'blogs.created_at', 'users.username', 'blogs.author_alt_name', 'blogs.status', 'blogs.is_deleted')
            ->paginate(2);

        $categories = (new Category())->index();

        return view(
            'admin.dashboard',
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
    public function store(Request $req) {
        $req->validate([
            'title' => 'required',
            'category' => 'required',
            'author' => 'required',
            'content' => 'required'
        ]);

        DB::table('blogs')->insert([
            'title' => $req->input('title'),
            'category' => $req->input('category'),
            'content' => $req->input('content'),
            'author_alt_name' => $req->input('author'),
            'author' => 1,
            'status' => 1,
            'is_deleted' => 0
        ]);
        session()->put('success', 'Tutorial added successfully');
        return redirect('/admin');
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
        $tutorial = DB::table('blogs')
            ->where('blogs.Id', '=', $id)
            ->first();
        return view('admin.edit', [
            'tutorial' => $tutorial,
            'categories' => (new Category())->index()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req) {
        // var_dump($id);
        // die;
        $req->validate([
            'title' => 'required',
            'category' => 'required',
            'author' => 'required',
            'content' => 'required'
        ]);

        DB::table('blogs')
            ->where('blogs.Id', '=', $req->input('id'))
            ->update([
                'title' => $req->input('title'),
                'category' => $req->input('category'),
                'content' => $req->input('content'),
                'author_alt_name' => $req->input('author'),
                'author' => 1,
                'status' => 1,
                'is_deleted' => 0
            ]);
        session()->put('success', 'Tutorial updated successfully');
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        DB::table('blogs')
            ->where('blogs.Id', '=', $id)
            ->update(['is_deleted' => 1]);
    }
}
