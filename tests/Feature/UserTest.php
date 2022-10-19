<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\User;
use App\Models\Publication;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUser()
    {
        $user = User::factory() -> create();
        $publication = Publication::factory() -> create([
            'user_id' => $user -> id
        ]);

        $response = $this->json('GET','/api/user');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                    'id','name', 'publications' => [
                        '*' => [
                            'id', 'title', 'content', 'user_id'
                        ]
                    ]
                ]);

                $this->assertCount(3, $response->json()['publications']);
    }
}
