<?php

namespace App\Http\Controllers;

use App\Models\users_books;
use App\Http\Requests\Storeusers_booksRequest;
use App\Http\Requests\Updateusers_booksRequest;

class UsersBooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\Storeusers_booksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeusers_booksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\users_books  $users_books
     * @return \Illuminate\Http\Response
     */
    public function show(users_books $users_books)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\users_books  $users_books
     * @return \Illuminate\Http\Response
     */
    public function edit(users_books $users_books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateusers_booksRequest  $request
     * @param  \App\Models\users_books  $users_books
     * @return \Illuminate\Http\Response
     */
    public function update(Updateusers_booksRequest $request, users_books $users_books)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\users_books  $users_books
     * @return \Illuminate\Http\Response
     */
    public function destroy(users_books $users_books)
    {
        //
    }
}
