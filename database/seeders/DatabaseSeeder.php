<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(5)->create();


        $user= User::factory()->create(['name' => 'Minul', 'email' => 'minul@gmail.com']);

        Product::factory(1)->create(['user_id' => $user->id]);

    }
}