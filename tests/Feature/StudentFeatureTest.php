<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_a_student()
    {
        $response = $this->post('/students', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'nt_id' => 1,
            'photo' => 'null',
            'phone' => '+998911234567',
            'profession' => 'Developer',
            'biography' => 'null',
        ]);

        $response->assertStatus(201);
        $this->assertDatabaseHas('students', ['first_name' => 'John']);
    }

    public function test_can_view_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->getJson(route('students.show', $student->id));

        $response->assertStatus(200)
            ->assertJson([
                'id' => $student->id,
                'first_name' => $student->first_name,
                'last_name' => $student->last_name,
                'nt_id' => $student->nt_id,
                'photo' => $student->photo,
                'phone' => $student->phone,
                'profession' => $student->profession,
                'biography' => $student->biography,
            ]);
    }

    public function test_can_update_a_student()
    {
        $student = Student::factory()->create();

        $updatedData = [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'nt_id' => 2,
            'photo' => 'new-photo-url',
            'phone' => '+998922345678',
            'profession' => 'Senior Developer',
            'biography' => 'Updated biography',
        ];

        $response = $this->json('PATCH', route('students.update', $student->id), $updatedData);

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $student->id,
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'nt_id' => 2,
            'photo' => 'new-photo-url',
            'phone' => '+998922345678',
            'profession' => 'Senior Developer',
            'biography' => 'Updated biography',
        ]);
    }

    public function test_can_delete_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->json('DELETE', route('students.destroy', $student->id));

        $response->assertStatus(204);
    }
}
