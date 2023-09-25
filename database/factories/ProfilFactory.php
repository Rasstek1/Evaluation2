<?php

namespace Database\Factories;

use App\Models\Profil;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'prenom' => $this->faker->firstName,
            'pays' => $this->faker->country,
            'sexe' => $this->faker->randomElement(['Homme', 'Femme']),
            'date_naissance' => $this->faker->date,
            'photoPath' => 'uploads/'
        ];
    }
}
