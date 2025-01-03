<?php

namespace App\Providers;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('partials.header', function ($view) {

            $notifications = Auth::check() && Auth::user()->hasRole('school')
                ? Notification::with('notificationTemplate')
                    ->where('user_id', Auth::id())
                    ->limit(3)
                    ->orderBy('id', 'desc')
                    ->get()
                : collect(); // Empty collection if not authenticated or not a "school" role user

            $view->with('notifications', $notifications);
        });
    }
}
