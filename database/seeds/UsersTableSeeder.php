<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Pavel Parvej',
            'email' => 'pavel@example.com',
            'password' => bcrypt('pavel007'),
            'admin' => 1
        ]);

        App\Profile::create([
            'user_id'   =>$user->id,
            'avatar'    => 'uploads/avatar/1.png',
            'about'     =>'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.',
            'facebook'  => 'facebook.com',
            'youtube'   => 'youtube.com'
        ]);
    }
}
