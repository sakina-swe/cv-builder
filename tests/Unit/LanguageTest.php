<?php

namespace Tests\Unit;

use App\Models\Language;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LanguageTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_create_language()
    {
        $data = [
            'name' => 'English',
            'level' => 'Intermediate',
        ];

        $response = $this->postJson(route('languages.store'), $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('languages', [
            'name' => 'English',
            'level' => 'Intermediate',
        ]);
    }

    public function test_can_update_a_language()
    {
        $language = Language::factory()->create();
        $updatedData = ['name' => 'Spanish'];

        $response = $this->put("/languages/{$language->id}", $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('languages', $updatedData);
    }

    public function test_can_delete_a_language()
    {
        $language = Language::factory()->create();

        $response = $this->delete("/languages/{$language->id}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('languages', ['id' => $language->id]);
    }

    public function test_can_retrieve_a_single_language()
    {
        $language = Language::factory()->create();

        $response = $this->get("/languages/{$language->id}");

        $response->assertStatus(200)
            ->assertJson([
                'id' => $language->id,
                'name' => $language->name,
            ]);
    }

    public function test_can_list_all_languages()
    {
        Language::factory()->count(3)->create();

        $response = $this->get('/languages');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    public function test_requires_a_unique_language_name()
    {
        Language::factory()->create(['name' => 'English']);
        $response = $this->post('/languages', ['name' => 'English']);

        $response->assertSessionHasErrors('name');
    }
}
