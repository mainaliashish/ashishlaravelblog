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
        App\User::create([
        	'name'			=> 'Ashish Mainali',
        	'email'			=> 'ashish@example.com',
        	'password'		=> bcrypt('password'),
            'admin'         => 1
        ]);

        App\Profile::create([
            'user_id'          => $user->id,
            'avatar'           => 'uploads/avatars/1.jpg',
            'about'            => 'Sunt enim in tempor magna cupidatat sint minim in laboris sit tempor. Lorem ipsum et dolore reprehenderit minim ut sint laboris culpa id incididunt do ut dolor enim magna ut pariatur irure consectetur officia ex nisi mollit laboris ea ea commodo ea do magna aliquip non labore incididunt ullamco nisi incididunt id deserunt occaecat irure cillum elit incididunt ut est duis magna dolor culpa reprehenderit mollit do ea velit ex proident tempor veniam id quis voluptate sit aliquip qui aliqua anim ',
            'facebook'          => 'facebook.com',
            'youtube'           => 'youtube.com'
        ]);
    }
}
