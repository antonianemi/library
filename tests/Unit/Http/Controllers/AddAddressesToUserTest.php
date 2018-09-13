<?php

namespace Tests\Unit\Http\Controllers;

use App\User;
use App\Address;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddAddressesToUserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function a_authenticated_user_can_add_their_address()
    {
        $this->be($user = factory(User::class)->create());

        $address = factory(Address::class)->create([
            'user_id' => $user->id,
        ]);

        $this->post('/users/'.$user->id.'/addresses', $address->toArray());

        $this->assertDatabaseHas('addresses', [
            'user_id' => $user->id,
            'state' => $address->state,
            'county'=> $address->county,
            'number' => $address->number,
            'street' => $address->street,
            'zip_code' => $address->zip_code,
        ]);
    }
}
