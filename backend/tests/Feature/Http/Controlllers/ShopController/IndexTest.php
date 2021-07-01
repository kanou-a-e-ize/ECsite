<?php

namespace Tests\Feature\Http\Controllers\ShopController;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class IndexTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;
    
    public function test_NonLogin_Invoke(): void
    {
        $response = $this->get('/index')
                    ->assertStatus(302)
                    ->assertRedirect('/login');
        
        $this->assertGuest();
    }

    public function test_Invoke(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'user')
        ->get('/index')
        ->assertStatus(200);
    }

    /*public function test_削除処理が成功する事を確認()
    {
        $user = User::factory()->create();
        $id=1;

        $response = $this->actingAs($user, 'user')
        ->get('/index')
        ->assertStatus(200);

        $response = $this->delete('/product/$id')
        ->assertStatus(404);
    }*/

}
