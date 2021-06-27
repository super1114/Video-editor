<?php

namespace Database\Factories;

use App\Models\CheckListNr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CheckListNrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CheckListNr::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'checklist_type' => 'On',
            'status' => $this->faker->text(255),
            'cladding_panels' => $this->faker->boolean,
            'handrail_ladder' => $this->faker->boolean,
            'compartment_internal' => $this->faker->boolean,
            'side_guards' => $this->faker->boolean,
            'rear_bumper' => $this->faker->boolean,
            'wings_stays' => $this->faker->boolean,
            'lights' => $this->faker->boolean,
            'engine' => $this->faker->boolean,
            'vacuum_pump' => $this->faker->boolean,
            'dipstrick' => $this->faker->boolean,
            'valve_operation' => $this->faker->boolean,
            'fire_extinguisher' => $this->faker->boolean,
            'chassis' => $this->faker->boolean,
            'note_1' => $this->faker->text(255),
            'ns_1' => $this->faker->numberBetween(0, 999),
            'os_1' => $this->faker->numberBetween(0, 999),
            'note_2' => $this->faker->text(255),
            'ns_2' => $this->faker->numberBetween(0, 999),
            'os_2' => $this->faker->numberBetween(0, 999),
            'note_3' => $this->faker->text(255),
            'ns_3' => $this->faker->numberBetween(0, 999),
            'os_3' => $this->faker->numberBetween(0, 999),
            'ext_splat_right' => $this->faker->text(255),
            'ext_splat_left' => $this->faker->text(255),
            'ext_splat_rear' => $this->faker->text(255),
            'ext_splat_front' => $this->faker->text(255),
            'int_splat' => $this->faker->text(255),
            'int_video' => $this->faker->text(255),
            'ext_video' => $this->faker->text(255),
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
