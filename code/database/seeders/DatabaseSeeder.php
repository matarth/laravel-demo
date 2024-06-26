<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Factory::create();

        // User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password')
        ]);


        $todoItems = ['vacuum', 'shop', 'run', 'tidy up'];

        foreach($todoItems as $item) {
            $todoItem = Todo::factory()->create([
                'name' => $item,
                'comment' => round(random_int(0, 1) === 1) ? $faker->words(10, true) : null,
                'created_at' => $faker->dateTimeThisYear('now'),
                'user_id' => $user->id,
            ]);
        }
    }
}
