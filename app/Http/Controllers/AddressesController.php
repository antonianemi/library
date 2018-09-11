<?php

namespace App\Http\Controllers;

use App\User;

class AddressesController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param User $user
     */
    public function store(User $user)
    {
        $user->addAddress([
            'user_id' => auth()->id(),
            'state' => request('state'),
            'county'=> request('county'),
            'number' => request('number'),
            'street' => request('street'),
            'zip_code' => request('zip_code'),
        ]);
    }
}
