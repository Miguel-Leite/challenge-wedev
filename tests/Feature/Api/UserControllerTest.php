<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  use RefreshDatabase;
  /**
   * A basic feature test example.
   */
  public function test_get_users_endpoint(): void
  {

    User::factory(3)->create();
    $response = $this->getJson('/api/users');
    $response->assertJsonCount(3, 'data');
    $response->assertStatus(200);
  }

  public function test_create_(): void
  {

    $data = [
      'name'=> 'Miguel',
      'email'=> 'miguel.leite@gmail.com',
      'is_admin'=> true,
      'password'=> '1234',
    ];

    $response = $this->postJson('/api/users',$data);
    $response->assertStatus(201);
  }
}
