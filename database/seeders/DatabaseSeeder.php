<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Product;
use App\Models\Posts;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory()->create(['email' => 'admin@example.com']);
        // // \App\Models\User::factory(10)->create();
        User::factory(20)->create();
        Product::factory(20)->create();
        Posts::factory(20)->create();
    }
}
