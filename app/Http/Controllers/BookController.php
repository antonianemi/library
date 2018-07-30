<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('books.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param BookRequest $request
     */
    public function store(BookRequest $request)
    {
        $book = new Book;

        $book->title = $request->get('title');
        $book->type_of_paper = $request->get('type_of_paper');
        $book->publisher = $request->get('publisher');
        $book->language = $request->get('language');
        $book->isbn_10 = $request->get('isbn_10');
        $book->isbn_13 = $request->get('isbn_13');
        $book->product_dimensions = $request->get('product_dimensions');
        $book->weight = $request->get('weight');
        $book->description = $request->get('description');

        $book->save();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $book = Book::find($id);

        return view('books.edit', compact('book'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  BookRequest $request
     * @param  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(BookRequest $request, $id)
    {
        $book = Book::find($id);

        $book->title = $request->get('title');
        $book->type_of_paper = $request->get('type_of_paper');
        $book->publisher = $request->get('publisher');
        $book->language = $request->get('language');
        $book->isbn_10 = $request->get('isbn_10');
        $book->isbn_13 = $request->get('isbn_13');
        $book->product_dimensions = $request->get('product_dimensions');
        $book->weight = $request->get('weight');
        $book->description = $request->get('description');

        $book->save();

        return redirect('books');
    }

    /**
     * Remove the specified resource form storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $book = Book::find($id);

        $book->delete();

        return redirect('/books');
    }
}
