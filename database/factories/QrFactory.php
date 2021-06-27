<?php

namespace Database\Factories;

use App\Models\Qr;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class QrFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Qr::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'label' => $this->faker->word,
            'tankers_id' => \App\Models\Tanker::factory(),
        ];
    }
}
