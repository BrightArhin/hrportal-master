<?php

namespace App\Listener;

use App\Events\Trying;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CatchTrying
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
     * @param  Trying  $event
     * @return void
     */
    public function handle(Trying $event)
    {
        //
    }
}
