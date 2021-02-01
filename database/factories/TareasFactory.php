<?php

namespace Database\Factories;

use App\Models\Tareas;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TareasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tareas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'nombre'=>$this->faker->sentence,
          'detalles'=>$this->faker->text(500),
        ];
    }
}
