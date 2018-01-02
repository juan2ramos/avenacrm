<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    /** @test */
    public function inicio()
    {
        $this->get('/')
        ->assertStatus(200)
        ->assertSee('Laravel');
    }
}
