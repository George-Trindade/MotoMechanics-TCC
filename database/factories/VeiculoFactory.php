<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Veiculo>
 */
class VeiculoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Modelo' => fake()->lastName(),
            'Marca' => fake()->state(),
            'Ano'=>fake()->year(),
            'Cor'=>fake()->colorName(),
            'Placa' => fake()->unique()->numerify('ABC ###'),
            'user_id'=> UserFactory::factory(),
        ];
    }
}
