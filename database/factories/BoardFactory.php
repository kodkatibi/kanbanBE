<?php

namespace Database\Factories;

use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BoardFactory extends Factory
{
    public function definition(): array
    {
        $statuses = Status::query()->orderBy('order')->pluck('id');
        $name = $this->faker->company;
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->text,
            'statuses' => $statuses
        ];
    }
}
