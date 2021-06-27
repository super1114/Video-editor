<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\CheckListRigid;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckListRigidFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CheckListRigid::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checklist_type' => 'On',
            'hirer_name' => $this->faker->text(255),
            'hirer_position' => $this->faker->text(255),
            'hirer_signature' => $this->faker->text(255),
            'hirer_sign_date' => $this->faker->dateTime,
            'tcl_name' => $this->faker->text(255),
            'tcl_position' => $this->faker->text(255),
            'tcl_signature' => $this->faker->text(255),
            'tcl_sign_date' => $this->faker->dateTime,
            'link' => $this->faker->text(255),
            'hire_id' => \App\Models\Hire::factory(),
        ];
    }
}
