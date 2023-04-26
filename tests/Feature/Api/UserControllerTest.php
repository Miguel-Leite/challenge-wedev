<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Mockery;
use Mockery\MockInterface;
use Tests\TestCase;

class UserControllerTest extends TestCase
{

  /**
   * A basic feature test example.
   */
  public function test_get_users_endpoint(): void
  {
    $response = $this->getJson('/');
    $response->assertStatus(200);
  }

  public function test_create(): void
  {

    $this->instance(
      User::class,
      Mockery::mock(User::class, function(MockInterface $mock) {
        $mock->shouldReceive('create')->once();
      }),
    );
  }
}
