<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'source_link' => $this->faker->url(),
            'demo_link' => $this->faker->url(),
        ];
    }
}
