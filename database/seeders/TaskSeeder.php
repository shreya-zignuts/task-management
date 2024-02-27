<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Illuminate\Support\Facades\Hash;

class TaskSeeder extends Seeder
{    
    public function run()
    {
       $user = User::factory()->create();
 
        Task::factory()->count(10)->create(['user_id' => $user->id]);
        
    }
}

