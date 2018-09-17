<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }
}
