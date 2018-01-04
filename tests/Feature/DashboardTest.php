<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    /**
     * @test
     */
    function muestra_usuario_conectado_en_el_dashboard(){

        $user = factory(User::class)->create();

        $this->actingAs($user)
            ->get(route('home'))
            ->assertSee('Dashboard')
            ->assertStatus(200);
    }
    /** @test */
    function it_redirects_guest_users_to_the_login_page()
    {
        $this->get(route('home'))
            ->assertStatus(302)
            ->assertRedirect('login');
    }
}
