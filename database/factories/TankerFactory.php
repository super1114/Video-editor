<?php

namespace Database\Factories;

use App\Models\Tanker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class TankerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tanker::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fleet_num' => $this->faker->text(255),
            'make' => $this->faker->text(255),
            'equipment' => $this->faker->text(255),
            'replacement_value' => $this->faker->randomNumber(5),
            'mot_expiry' => $this->faker->date,
            'adr_expiry' => $this->faker->date,
            'chassis_num' => $this->faker->text(255),
            'discharge_pump' => $this->faker->boolean,
            'service_interval' => $this->faker->text(255),
            'serial_num' => $this->faker->text(255),
            'tank_type' => $this->faker->text(255),
            'sector' => $this->faker->text(255),
        ];
    }
}
