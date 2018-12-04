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
        \Schema::disableForeignKeyConstraints();
        \DB::table('users')->truncate();
        \DB::table('post_categories')->truncate();
    	\DB::table('posts')->truncate();
        $this->call(UsersTableSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
