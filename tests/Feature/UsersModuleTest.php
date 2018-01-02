<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    public function it_load_users_list()
    {
        $this->get('/')
        ->assertStatus(200)
        ->assertSee('Laravel');
    }
}
