<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::factory()->count(20)->create();

        $categoryCount = Category::count();

        $articles->each(function (Article $article) use ($categoryCount) {
            for ($i = 0; $i < rand(1, $categoryCount); $i++) {
                $article->categories()->syncWithoutDetaching(rand(1, $categoryCount));
            }
        });
    }
}
