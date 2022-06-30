<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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
        //
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

    public function login(Request $req) {
        $req->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);
        $user_data = DB::table('users')
            ->where('users.email', '=', $req->Input('email'))
            ->where('users.password', '=', $req->Input('password'))
            ->first();

        if ($user_data) {
            session()->put('id', $user_data->id);
            session()->put('name', $user_data->name);
            session()->put('username', $user_data->username);
            session()->put('email', $user_data->email);
            session()->put('role', $user_data->role);
            session()->put('success', 'Login Successfull');
            return redirect('/admin/');
        } else {
            session()->put('error', 'Invalid Credintials');
            return redirect('/admin/login');
        }
    }

    public function logout() {
        session()->flush();
        return redirect('/admin/login');
    }
}
