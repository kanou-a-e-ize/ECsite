<?php

namespace App\Providers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Facades\Auth;
use App\Actions\User\AttemptToAuthenticate;
use Illuminate\Support\ServiceProvider;

class UserLoginServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app
            ->when([LoginController::class, AttemptToAuthenticate::class])
            ->needs(StatefulGuard::class)
            ->give(function () {
                return Auth::guard('user');
            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
