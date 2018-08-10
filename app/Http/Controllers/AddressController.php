<?php

namespace App\Http\Controllers;

use App\User;

class AddressController extends Controller
{
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
