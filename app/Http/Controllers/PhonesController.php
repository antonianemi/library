<?php

namespace App\Http\Controllers;

use App\User;

class PhonesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     */
    public function store(User $user)
    {
        $user->addPhones([
            'cellphone_number' => request('cellphone_number'),
            'user_id' => auth()->id(),
        ]);
    }
}
