<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->hasArticles(3)->create();

        /*Article::factory()->create([
            ArticleEnum::USER_ID->value => 1,
            ArticleEnum::TITLE->value => 'test title 1',
            ArticleEnum::TEXT->value => 'test text 1',
        ]);*/
    }
}
