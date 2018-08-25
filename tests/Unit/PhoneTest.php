<?php

namespace Tests\Unit;

use App\Phone;
use Tests\TestCase;

class PhoneTest extends TestCase
{
    /** @test **/
    public function it_does_use_another_primary_key()
    {
        $this->assertEquals('cellphone_number', (new Phone)->primaryKey);
    }

    /** @test **/
    public function it_is_disable_the_auto_incrementing_primary_key()
    {
        $this->assertFalse((new Phone)->incrementing);
    }
}