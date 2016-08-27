<?php

use Illuminate\Database\Seeder;

use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();
        Article::create([
        	'title' => 'Title',
			'content' => 'Content',
			'author' => 'Author',
			'image' => 'Image',
			
        ]);
    }
}
