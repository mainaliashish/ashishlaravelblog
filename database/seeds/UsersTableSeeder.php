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
        $user = \App\User::create([
        	'name'			=> 'Ashish Mainali',
        	'email'			=> 'ashish@example.com',
        	'password'		=> bcrypt('password'),
            'admin'         => 1
        ]);

        \App\Profile::create([
            'user_id'          => $user->id,
            'avatar'           => 'uploads/avatars/preset.png',
            'about'            => 'Sunt enim in tempor magna cupidatat sint minim in laboris sit tempor. Lorem ipsum et dolore reprehenderit minim ut sint laboris culpa id incididunt do ut dolor enim magna',
            'facebook'          => 'facebook.com',
            'youtube'           => 'youtube.com'
        ]);
    }
}
