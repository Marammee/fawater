<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bill;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // roles and permissions
        $this->call(RolePermissionSeeder::class);

        // Create 10 categories
        $categories = Category::factory()->count(10)->create();

        // Create 5 users
        $users = User::factory()->count(50)->create();

        // Add admin role to 5 users
        $adminUsers = User::take(5)->get(); // Get the first 5 users (or adjust logic to fit your need)
        foreach ($adminUsers as $user) {
            $user->addRole('admin'); // Assign the 'admin' role to these 5 users
        }

        // Add user role to the next 5 users
        $userUsers = User::skip(5)->take(5)->get(); // Skip first 5 users and get the next 5
        foreach ($userUsers as $user) {
            $user->addRole('user'); // Assign the 'user' role to these 5 users
        }


        // Create 20 bills
        Bill::factory()->count(100)->create([
            'category_id' => function () use ($categories) {
                return $categories->random()->id;
            },
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },
        ]);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
