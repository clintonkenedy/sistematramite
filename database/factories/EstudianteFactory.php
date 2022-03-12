<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'document_id'=> 11,
            'nombre'=> $this->faker->name(),
            'apellido_paterno'=> $this->faker->lastName(),
            'apellido_materno'=> $this->faker->lastName(),
            'dni'=> $this->faker->numerify(),
            'direccion'=> $this->faker->address(),
            'celular'=> $this->faker->phoneNumber(),
            'correo'=> 'nombre'.'@gmail.com',
        ];
    }
}
