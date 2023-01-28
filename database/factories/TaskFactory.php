<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition(): array
    {
        return [
            'created_by' => User::inRandomOrder()->first()->id,
            'assigned_to_user_id' => User::inRandomOrder()->first()->id,
            'status_id' => Status::inRandomOrder()->first()->id,
            'board_id' => Board::inRandomOrder()->first()->id,
            'title' => $this->faker->jobTitle,
            'description' => $this->faker->text,
            'order' => $this->faker->numberBetween(0, 10),
        ];
    }
}
