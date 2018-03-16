<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_license_has_an_owner()
    {
        $license = factory('App\License')->create();

        $this->assertInstanceOf('App\Customer', $license->owner);
    }

}
