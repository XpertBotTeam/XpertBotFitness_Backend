<?php namespace Tests\Unit;

use App\Models\Exercise;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class ExerciseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_exercise()
    {
        $exerciseData = [
            'title' => 'Example Exercise',
            'youtube_link' => 'https://www.youtube.com/example',
            'duration' => 30, 
            'workout_id' => 1,
        ];

        $response = $this->json('POST', '/api/exercises', $exerciseData);

        $response->assertStatus(201) 

                 ->assertJsonFragment($exerciseData);

        $this->assertDatabaseHas('exercises', $exerciseData);
    }
}
?>