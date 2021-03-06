<?php

namespace App\Providers;


use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\SupervisorAppraised'=>[
            'App\Listener\UpdateAppraisalStatus'
        ],
        'App\Events\EmployeeAppraised'=>[
            'App\Listener\SendApprovalEmail'
        ],
        'App\Events\PendingAppraisals'=>[
            'App\Listener\SendSupervisorEmail'
        ],
        'App\Events\YearlyAppraisal'=>[
            'App\Listener\SendReminder'
        ],
        'App\Events\EmployeeApproved'=>[
            'App\Listener\SendApprovedEmail'
        ]


    ];

    protected $subscribe = [
       'App\Listeners\EmployeeEventSubscriber',
        'App\Listeners\AppraisalEventSubscriber'
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
