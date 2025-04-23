<?php

namespace Database\Factories;

use App\Models\customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class customerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = customer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->word,
        'lastname' => $this->faker->word,
        'email' => $this->faker->word,
        'phone' => $this->faker->word,
        'password' => $this->faker->word,
        'createdat' => $this->faker->date('Y-m-d H:i:s'),
        'updatedat' => $this->faker->date('Y-m-d H:i:s'),
        'deletedat' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
