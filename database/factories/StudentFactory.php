<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Student::class;

    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'nt_id' => $this->faker->numberBetween(1000, 99999),
            'photo' => null,
            'phone' => $this->faker->regexify('\+998[0-9]{9}'),
            'profession' => $this->faker->jobTitle(),
            'biography' => null,
        ];
    }
}
