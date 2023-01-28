<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoardFactory extends Factory
{
    public function definition(): array
    {
        $statuses = Status::query()->orderBy('order')->pluck('id');
       // dd($statuses);
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $this->faker->company,
            'description' => $this->faker->text,
            'statuses' => $statuses
        ];
    }
}
