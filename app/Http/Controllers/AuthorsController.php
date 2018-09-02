<?php

namespace App\Http\Controllers;

use App\Author;
use App\Http\Requests\AuthorRequest;

class AuthorsController extends Controller
{
    /**
     * index, get list authors
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $authors = Author::all();

        return view('authors.index', compact('authors'));
    }

    /**
     * create, get view for create new author
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\Views
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AuthorRequest $request
     */
    public function store(AuthorRequest $request)
    {
        $author = new Author;

        $author->name = $request->get('name');
        $author->middle_name = $request->get('middle_name');
        $author->last_name = $request->get('last_name');
        $author->mothers_last_name = $request->get('mothers_last_name');
        
        $author->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $author = Author::find($id);

        return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $author = Author::find($id);

        return view('authors.edit', compact('author'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  AuthorRequest $request
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(AuthorRequest $request, $id)
    {
        $author = Author::find($id);

        $author->name = $request->get('name');
        $author->middle_name = $request->get('middle_name');
        $author->last_name = $request->get('last_name');
        $author->mothers_last_name = $request->get('mothers_last_name');

        $author->save();

        return redirect('authors');
    }

    /**
     * Remove the specified resource form storage.
     *
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $author = Author::find($id);

        $author->delete();

        return redirect('/authors');
    }
}
