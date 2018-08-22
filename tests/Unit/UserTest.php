<?php

namespace Test\Unit\UserTest;

use App\User;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserTest extends TestCase
{
    /** @test **/
    public function user_has_many_address()
    {
        $user = factory(User::class)->create();

        $this->assertInstanceOf(HasMany::class, $user->addresses());
    }
}
