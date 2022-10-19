<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Publication;
use App\Models\User;

class PublicationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostPublicaction()
    {
        $user  = User::factory() ->create();
        $publication = Publication::factory()->count(5)->create();
        
        $response = $this->json('POST','/api/publications',[
            'id'=> $user -> id,
            'title' => $publication -> title,
            'content' => $publication ->content,
            'likes' => $publication ->likes,
            'user_id' => $user -> id
        ]);
        $response->assertJsonStructure([
            'id', 'title','content','lkes', 'user_id'
        ])->assertStatus(201);

        $this-> assertDatabaseHas('publications',[
            'title' => $publication -> title,
            'content' => $publication ->content,
            'likes' => $publication ->likes,
            'user_id' => $user ->id
        ]);

        $this-> assertDatabaseHas('users',[
            'id'=> $user ->id,
            'name' => $user ->name]);
    }
}
