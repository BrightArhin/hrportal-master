<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AppraisalEventSubscriber
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
     * @param  object  $event
     * @return void
     */
    public function handleAppraisalCompleted($event)
    {
        $event->appraisal->status = 'Completed';
        $event->appraisal->save();
    }

    public function handleAppraisalEvaluated($event){
        $event->appraisal->status = 'Evaluated';
        $event->appraisal->save();
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */

    public function subscribe($events){
        $events->listen('App\Events\AppraisalCompleteEvent',
            'App\Listeners\AppraisalEventSubscriber@handleAppraisalCompleted');

        $events->listen('App\Events\AppraisalEvaluatedEvent',
            'App\Listeners\AppraisalEventSubscriber@handleAppraisalEvaluated');

    }
}
