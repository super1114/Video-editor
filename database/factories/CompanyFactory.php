<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company' => $this->faker->name,
            'address' => $this->faker->address,
            'postcode' => $this->faker->postcode,
            'phone' => $this->faker->phoneNumber,
            'contact' => $this->faker->text(255),
            'mobile' => $this->faker->phoneNumber,
        ];
    }
}
