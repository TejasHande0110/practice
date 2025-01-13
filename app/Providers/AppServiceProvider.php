<?php

namespace App\Providers;

use App\Events\BookPurchased;
use App\Listeners\SendPurchaseMail;
use Illuminate\Support\ServiceProvider;
use App\Models\Transaction;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    protected $listen = [
        Transaction::class => [
            SendEmailVerificationNotification::class,
        ],
        // Add This listener
        BookPurchased::class => [
            SendPurchaseMail::class
        ]
       ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
