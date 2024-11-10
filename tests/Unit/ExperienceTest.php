<?php

namespace Tests\Unit;

use App\Models\Student;
use Tests\TestCase;
use App\Models\Experience;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExperienceTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_create_an_experience()
    {
        $student = Student::factory()->create();

        $data = [
            'student_id' => $student->id,
            'name' => 'Software Development Internship',
            'position' => 'Junior Developer',
            'description' => 'Worked on backend APIs and unit tests.',
            'start_date' => '2024-01-01',
            'end_date' => '2024-06-01'
        ];

        $experience = Experience::create($data);

            $this->assertDatabaseHas('experiences', $data);
    }



    public function test_can_update_an_experience()
    {
        $experience = Experience::factory()->create();

        $experience->update(['position' => 'Senior Developer']);

        $this->assertDatabaseHas('experiences', ['position' => 'Senior Developer']);
    }

    public function test_can_delete_an_experience()
    {
        $student = Student::factory()->create();
        $experience = Experience::factory()->create([
            'student_id' => $student->id,
            'name' => 'Internship at Company X',
            'position' => 'Junior Developer'
        ]);

        $experience->delete();

        $this->assertDatabaseMissing('experiences', ['id' => $experience->id]);
    }

}
