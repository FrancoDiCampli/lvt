<?php

namespace App\Observers;

use App\Enrollment;

class EnrollmentObserver
{
    /**
     * Handle the enrollment "created" event.
     *
     * @param  \App\Enrollment  $enrollment
     * @return void
     */
    public function created(Enrollment $enrollment)
    {
        //
    }

    /**
     * Handle the enrollment "updated" event.
     *
     * @param  \App\Enrollment  $enrollment
     * @return void
     */
    public function updated(Enrollment $enrollment)
    {
        //
    }

    /**
     * Handle the enrollment "deleted" event.
     *
     * @param  \App\Enrollment  $enrollment
     * @return void
     */
    public function deleted(Enrollment $enrollment)
    {
        //
    }

    /**
     * Handle the enrollment "restored" event.
     *
     * @param  \App\Enrollment  $enrollment
     * @return void
     */
    public function restored(Enrollment $enrollment)
    {
        //
    }

    /**
     * Handle the enrollment "force deleted" event.
     *
     * @param  \App\Enrollment  $enrollment
     * @return void
     */
    public function forceDeleted(Enrollment $enrollment)
    {
        //
    }
}
