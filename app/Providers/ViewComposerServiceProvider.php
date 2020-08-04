<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(Auth::user()) {
            $employees = Auth::user()->load(['employees.appraisals' => function ($query) {
                $query->whereStatus('Pending');
            }]);

            if ($employees) {
                $newToEval = count($employees->employees->flatMap->appraisals);
            } else {
                $newToEval = 0;
            }

            View::composer([], function ($view) use ($newToEval) {
                $view->with($newToEval);
            });
        }
    }
}
