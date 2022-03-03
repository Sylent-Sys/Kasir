<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TransaksiDetail;
use App\Models\User;

class TransaksiDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TransaksiDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => User::factory(),
            'no_meja' => $this->faker->numberBetween(0, 10000),
            'total' => $this->faker->numberBetween(0, 10000),
        ];
    }
}
