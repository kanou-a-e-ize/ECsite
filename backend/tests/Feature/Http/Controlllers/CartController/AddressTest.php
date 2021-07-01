<?php

namespace Tests\Feature\Http\Controllers\CartController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class AddressTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_NonLogin_Invoke(): void
    {
        $response = $this->get('/cart/address')
                    ->assertStatus(302)
                    ->assertRedirect('/member/login');
        
        $this->assertGuest();
    }

    public function test_Invoke(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'member')
        ->get('/cart/address')
        ->assertStatus(200);
    }

    

}
