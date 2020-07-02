<?php

namespace App\Observers;

use App\Enrollment;
use App\User;
use App\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentObserver
{
    public static $course = '';

    /**
     * Handle the student "created" event.
     *
     * @param  \App\Student  $student
     * @return void
     */
    public function created(Student $student)
    {
        // DB::table('users')->insert([
        //     'name' => $student->name,
        //     'email' => $student->email,
        //     'password' => Hash::make($student->dni),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        $user = User::create([
            'name' => $student->name,
            'email' => $student->email,
            'password' => Hash::make($student->dni),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Enrollment::create([
            'cicle'=>2020,
            'user_id' => $user->id,
            'course_id'=>self::$course
        ]);
    }

    /**
     * Handle the student "updated" event.
     *
     * @param  \App\Student  $student
     * @return void
     */
    public function updated(Student $student)
    {
        //
    }

    /**
     * Handle the student "deleted" event.
     *
     * @param  \App\Student  $student
     * @return void
     */
    public function deleted(Student $student)
    {
        //
    }

    /**
     * Handle the student "restored" event.
     *
     * @param  \App\Student  $student
     * @return void
     */
    public function restored(Student $student)
    {
        //
    }

    /**
     * Handle the student "force deleted" event.
     *
     * @param  \App\Student  $student
     * @return void
     */
    public function forceDeleted(Student $student)
    {
        //
    }
}
