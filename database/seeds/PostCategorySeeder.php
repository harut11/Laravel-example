<?php

use Illuminate\Database\Seeder;
use \App\PostCategories;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	'Interesting',
        	'Positive',
        	'History',
        	'Humor',
        	'Other',
        ];

        foreach ($data as $category) {
        	PostCategories::create([
        		'title' => $category,
        	]);
        }
    }
}
