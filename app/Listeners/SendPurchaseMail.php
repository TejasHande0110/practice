<?php

namespace App\Listeners;

use App\Events\bookPurchased;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendPurchaseMail implements ShouldQueue
{
    /**
     * Create the event listener.
     */

     use InteractsWithQueue;
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(bookPurchased $event): void
    {
        //
        $transaction = $event->transaction;
        $name = $transaction->name;
        $email = $transaction->mail;
    }
}
