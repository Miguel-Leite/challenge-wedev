<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Faker\Factory as Faker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  use RefreshDatabase;
  use WithFaker;

  /**
   * A basic feature test example.
   */
  public function test_get_users_endpoint(): void
  {
    User::factory(3)->create();
    $response = $this->getJson('/api/users');
    $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
  }

  public function test_create_user_endpoint(): void
  {
    $faker = Faker::create();

    $response = $this->postJson('/api/users', [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => 'password123',
        'role' => 'user'
    ]);

    $response->assertStatus(201);
  }
}
