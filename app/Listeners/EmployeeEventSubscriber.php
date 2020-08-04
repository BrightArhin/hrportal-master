<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmployeeEventSubscriber
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
    public function handleUpdate($event)
    {
        //
        dd($event->employee->first_name);
    }

    public function handleSave($event){
        dd($event->employee->last_name);
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events){
        $events->listen('App\Events\EmployeeUpdate',
            'App\Listeners\EmployeeEventSubscriber@handleUpdate');

        $events->listen('App\Events\EmployeeSave',
            'App\Listeners\EmployeeEventSubscriber@handleSave');
    }


}
