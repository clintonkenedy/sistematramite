<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $codigo1 = Str::random(4);
        $codigo2 = now()->format('dmY');

        return [
            'tipo_id'=> 2,
            'codigo_tramite'=> $codigo1.$codigo2,
            'titulo'=> $this->faker->word(),
            'contenido'=> $this->faker->sentence(),
        ];
    }
}
