<?php

namespace Tests\Feature;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    public function test_ログイン画面の表示()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        // 認証されていないことを確認
        $this->assertGuest();
    }

    public function test_ログイン認証(): void
    {
        $this->withoutMiddleware([VerifyCsrfToken::class]); // CSRFを無効化
        
        $this->user = User::factory()->create();
        // 作成したテストユーザのemailとpasswordで認証リクエスト
        $response = $this->post(route('login'), [
            'email' => $this->user->email,
            'password' => 'password',
        ]);

        // リクエスト送信後、正しくリダイレクト処理されていることを確認
        $response->assertRedirect('/index');

        // 指定したユーザーが認証されていることを確認
        $this->assertAuthenticatedAs($this->user);
    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_ログアウト(): void
    {
        $this->withoutMiddleware([VerifyCsrfToken::class]); // CSRFを無効化

        $user = User::factory()->create();

        $this->actingAs($user, 'user');
        $this->assertAuthenticated();

        $response = $this->post('/logout');

        // ホーム画面にリダイレクト
        $response->assertStatus(302)
                 ->assertRedirect('/login');
                 
        // 認証されていないことを確認
        $this->assertGuest();

    }
}