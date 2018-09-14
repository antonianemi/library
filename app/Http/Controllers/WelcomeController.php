<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    /**
     * Show the welcome page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome');
    }
}
