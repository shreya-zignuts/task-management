<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;

class TasksTableSeeder extends Seeder
{    
    public function run()
    {
        // Retrieve a user to get its ID
        $user = User::first(); // Adjust this to fetch the appropriate user

        if ($user) {
            // Use TaskFactory to seed tasks with the user ID
            Task::factory()->count(10)->create(['user_id' => $user->id]);
        } else {
            $this->command->info('No users found. Please create users before seeding tasks.');
        }
    }
}

