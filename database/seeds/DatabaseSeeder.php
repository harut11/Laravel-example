<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	\DB::table('posts')->truncate();
        $this->call(PostsTableSeeder::class);
    }
}
