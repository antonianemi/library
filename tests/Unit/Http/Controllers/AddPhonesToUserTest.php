<?php

namespace Tests\Unit\Http\Http\Controllers\AddPhoneToUserTeat;

use App\User;
use App\Phone;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AddPhonesToUserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test **/
    public function a_user_can_add_his_cellphone_number()
    {
        $this->be($user = factory(User::class)->create());

        $phone = factory(Phone::class)->create([
            'user_id' => $user->id,
        ]);

        $this->post("/users/{$user->id}/phones", [
            'user_id' => $user->id,
            'cellphone_number' => $phone->cellphone_number,
        ]);

        $this->assertDatabaseHas('phones', [
            'cellphone_number' => $phone->cellphone_number,
            'user_id' => $user->id,
        ]);
    }
}
