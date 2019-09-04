<?php

namespace Equivalencias\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Equivalencias\User;
use DateTime;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuccessfulLogin
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
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event){
        //
        $date=Carbon::now();
        $event->user->last_login = $date->format('l jS \\of F Y h:i:s A');
        $event->user->save();
    }
}
