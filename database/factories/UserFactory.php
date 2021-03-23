<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => 123456,
            'remember_token' => Str::random(10),
            'is_active' => $this->faker->numberBetween(0,1),
            'first_name' => $this->faker->firstName('male'|'female'),
            'last_name' => $this->faker->lastName,
            'images' => $this->faker->imageUrl($width = 640, $height = 480),
            'gender' => $this->faker->numberBetween(0,2),
            'birthday' => $this->faker->dateTime(),
            'address' => $this->faker->address
        ];
    }
}
