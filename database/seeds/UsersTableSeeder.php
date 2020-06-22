<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('asdf1234'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $this->users();

    }

    function users()
    {
        factory(App\User::class, 20)->create(
            [
                'password' => bcrypt('asdf1234')
            ]
        );

        $admin = Role::create(['name' => 'admin']);
        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name' => 'student']);

        $user = User::find(1);
        $user->assignRole($admin);

       for ($i=2; $i <=8 ; $i++) {
            $user = User::find($i);
            $user->assignRole($teacher);

       }


       for ($i=9; $i <=20 ; $i++) {
            $user = User::find($i);
            $user->assignRole($student);

        }



    }





}
