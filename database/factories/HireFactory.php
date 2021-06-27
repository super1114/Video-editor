<?php

namespace Database\Factories;

use App\Models\Hire;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class HireFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hire::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'delivery_date' => $this->faker->date,
            'hire_type' => 'Daily',
            'hire_rate' => $this->faker->randomNumber(2),
            'deposit' => $this->faker->randomNumber(2),
            'minimum_hire_period' => $this->faker->text(255),
            'notice_period' => $this->faker->text(255),
            'maintenance_included' => $this->faker->boolean,
            'tyres_included' => $this->faker->boolean,
            'delivery_charge' => $this->faker->randomNumber(2),
            'collection_charge' => $this->faker->randomNumber(2),
            'water_fill_charge' => $this->faker->randomNumber(2),
            'tyre_wear_charge' => $this->faker->randomNumber(2),
            'commissioning_charge' => $this->faker->randomNumber(2),
            'cleaning_outside_charge' => $this->faker->randomNumber(2),
            'cleanout_charge' => $this->faker->randomNumber(2),
            'other_charge' => $this->faker->randomNumber(2),
            'charge_notes' => $this->faker->text(255),
            'delivery_address' => $this->faker->text(255),
            'delivery_postcode' => $this->faker->text(255),
            'delivery_phone' => $this->faker->text(255),
            'delivery_email' => $this->faker->text(255),
            'delivery_fax' => $this->faker->text(255),
            'delivery_contact_name' => $this->faker->text(255),
            'insurer' => $this->faker->text(255),
            'policy_num' => $this->faker->text(255),
            'broker' => $this->faker->text(255),
            'policy_type' => $this->faker->text(255),
            'policy_expiry' => $this->faker->date,
            'policy_value' => $this->faker->randomNumber(2),
            'policy_notes' => $this->faker->text(255),
            'hirer_name' => $this->faker->text(255),
            'hirer_position' => $this->faker->text(255),
            'hirer_signature' => $this->faker->text(255),
            'hirer_sign_date' => $this->faker->date,
            'hirer_ip' => $this->faker->text(255),
            'hirer_geo' => $this->faker->text(255),
            'tcl_name' => $this->faker->text(255),
            'tcl_position' => $this->faker->text(255),
            'tcl_signature' => $this->faker->text(255),
            'tcl_sign_date' => $this->faker->date,
            'link' => $this->faker->text(255),
            'company_id' => \App\Models\Company::factory(),
            'tanker_id' => \App\Models\Tanker::factory(),
            'uuid' => Str::uuid(),
        ];
    }
}
