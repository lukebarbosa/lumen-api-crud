<?php

namespace Tests\Features\app\Http\Controllers;

use App\Models\User;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testUsersCanBeListed()
    {
        User::factory(5)->create();

        $response = $this->get('/users');

        $response->assertResponseOk();
        $response->seeJsonStructure(['current_page']);
    }

    public function testUserCanBeCreated()
    {
        $payload = [
            'name' => 'Lucas Barbosa',
            'email' => 'lucas@gmail.com',
            'password' => '123456'
        ];

        $result = $this->post('/users', $payload);
        $result->assertResponseStatus(201); // 201 = CREATED
        $result->seeInDatabase('users', $payload);
    }

    public function testUserShouldSendNameEmailPassword()
    {
        $paylod = [
            'send' => 'nothing'
        ];

        $response = $this->post('/users', $paylod);

        $response->assertResponseStatus(422); // 422 - UNPROCESSABLE INTITY
    }

    public function testUserCanBeRetrievedById()
    {
        $user = User::factory()->create();

        $response = $this->get('/users/' . $user->id);
        $response->assertResponseOk();
        $response->seeJsonContains(['id' => $user->id]);
    }

    public function testUserCanBeEdited()
    {
        $user = User::factory()->create();

        $payload = [
            'name' => 'Lucas Barbosa',
            'email' => 'lucas@gmail.com',
        ];

        $response = $this->put('/users/' . $user->id, $payload);

        $response->assertResponseOk();
        $response->seeInDatabase('users', $payload);
    }

    public function testUserCanBeDeleted()
    {
        $user = User::factory()->create();

        $response = $this->delete('/users/' . $user->id);
        $response->assertResponseStatus(204); // 204 - No Content
        $response->notSeeInDatabase('users', ['id' => $user->id]);
    }
}
