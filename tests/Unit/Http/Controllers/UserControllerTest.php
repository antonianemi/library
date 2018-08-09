<?php

namespace Tests\Unit\Http\Controllers\UserControllerTest;

use App\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /** @test **/
    public function user_can_visualize_his_information()
    {
        $user = factory(User::class)->create();

        $response = $this->get("/users/{$user->id}");

        $response->assertViewIs('users.show');

        $response->assertSuccessful();

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
            'middle_name' => $user->middle_name,
            'last_name' => $user->last_name,
            'mothers_last_name' => $user->mothers_last_name,
            'sex' => $user->sex,
            'date_of_birth' => $user->date_of_birth,
        ]);
    }
}
