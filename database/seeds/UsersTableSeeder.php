<?php

use Illuminate\Database\Seeder;
use \App\User;
use App\UserDetails;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'admin',
        	'email' => 'admin@example.com',
        	'password' => bcrypt('secret'),
            'is_admin' => 1,
        ]);
        factory(User::class, 10)->create()->each(function($user) {
            $details = factory(UserDetails::class)->make();
            $user->details()->update($details->getAttributes());
        });
    }
}
