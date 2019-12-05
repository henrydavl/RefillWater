<?php

namespace App\Listeners;

use App\Events\ActivationEmail;
use Illuminate\Support\Facades\Mail;

class SendActivationEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ActivationEmail  $event
     * @return void
     */
    public function handle(ActivationEmail $event)
    {
        Mail::to($event->user->email)->send(new \App\Mail\ActivationEmail($event->user));
    }
}
