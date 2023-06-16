<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     *
     */

    public function definition():array
    {
        return [

            'firstname' => $this->faker->firstname(),
            'lastname' => $this->faker->lastname(),
            'adresse' => $this->faker->text(),
            'phone' => $this->faker->numberBetween(),
            'idrole' => 1,
            'poste' => $this->faker->text(),
            'poste_id' =>1,
            'archived' => 0,
            'deleted' => 0,
            'deleted_at' => $this->faker->dateTime(),
            'deleted_by' => 0,
            'departement_id' =>1,
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'is_active'=> 1,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
