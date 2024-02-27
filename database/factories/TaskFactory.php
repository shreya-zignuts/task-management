<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Database\Factories\UserFactory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'task_name' => $this->faker->sentence,
            'due_date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'description' => $this->faker->text,
            'created_at' => now(),
            'updated_at' => now(),
            // Define other attributes as needed
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Task $task) {
            $user = auth()->user(); // Get the authenticated user
            if ($user) {
                $task->user_id = $user->id; // Assign user ID to the task
                $task->save(); // Save the task with the user ID
            }
        });
    }
}
