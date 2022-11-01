<?php

namespace Database\Factories;

use App\Models\Stadium;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stadium>
 */
class StadiumFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stadium::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'region' => $this->faker->text,
            'location' => $this->faker->name,
            'capacity' => $this->faker->randomFloat(4),
            'stadium_owner' => $this->faker->name,
            'stadium_picture' => $this->faker->image('public/images', 640, 480, null, false),
            'inauguration_date' => $this->faker->date('Y-m-d', $max = now())
        ];
    }
}
