<?php

namespace Database\Factories;

use App\Models\bouquet;
use Illuminate\Database\Eloquent\Factories\Factory;

class bouquetFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = bouquet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'productid' => $this->faker->randomDigitNotNull,
        'flowertype' => $this->faker->word,
        'size' => $this->faker->word
        ];
    }
}
