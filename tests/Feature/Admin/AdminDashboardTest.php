<?php

namespace Tests\Feature\Admin;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function admins_puede_visitar_el_admin_dashboard()
    {
        $admin = factory(User::class)->create([
            'email' => 'juan@g.com'
        ]);
        $this->actingAs($admin)
            ->get('admin')
            ->assertStatus(200);
    }

}
