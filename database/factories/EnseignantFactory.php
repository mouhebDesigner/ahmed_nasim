<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Enseignant;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnseignantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Enseignant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'specialite' => 'informatique',
            'user_id' => User::where('grade', 'enseignant')->get()->random()->id
        ];
    }
}
