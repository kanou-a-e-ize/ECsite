<?php

namespace Tests\Feature\Http\Controllers\ShopController;

use App\Models\User;
//use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class StoreproductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    use RefreshDatabase;

    public function test_NonLogin_Invoke(): void
    {
        $response = $this->get('/create')
                ->assertStatus(302)
                ->assertRedirect('/login');
        
        $this->assertGuest();
    }

    public function test_create_Invoke(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'user')
        ->get('/create')
        ->assertStatus(200);
    }

    public function test_store_product()
    {
        $this->withoutMiddleware([VerifyCsrfToken::class]); // CSRFを無効化
        
        $user = User::factory()->create();

        Storage::fake('testing');
        $file1 = UploadedFile::fake()->image('dummy1.jpg', 920, 920);
        $file2 = UploadedFile::fake()->image('dummy2.jpg', 920, 920);
        $file3 = UploadedFile::fake()->image('dummy3.jpg', 920, 920);

        $response = $this->actingAs($user, 'user')
        ->get('/create')
        ->assertStatus(200);

        $response = $this->post('/store', [
            'p_name' => 'りんご',
            'p_detail' => '青森県産のりんごです。',
            'p_price' => '150',
            'image1' => $file1,
            'image2' => $file2,
            'image3' => $file3
        ])->assertStatus(302)
        ->assertRedirect('/index');

        /*
        Storage::disk('testing')->assertExists($file1->hashName());
        Storage::disk('testing')->assertExists($file2->name);
        Storage::disk('testing')->assertExists($file3->name);

        Product::where('p_name', 'りんご')->delete();

        $response->assertRedirect('/index');
        */
    }
}
