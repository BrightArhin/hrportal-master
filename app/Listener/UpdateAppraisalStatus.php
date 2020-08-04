<?php

namespace App\Listener;

use App\Events\SupervisorAppraised;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateAppraisalStatus
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
     * @param  SupervisorAppraised  $event
     * @return void
     */
    public function handle(SupervisorAppraised $event)
    {
        $event->appraisal->status = 'Evaluated';
        $event->appraisal->save();
    }
}
