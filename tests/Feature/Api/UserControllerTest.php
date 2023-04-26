<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Faker\Factory as Faker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  use WithFaker;

  public function setUp(): void
  {
    parent::setUp();

    // Cria a conexão com o banco de dados em memória (SQLite)
    $this->app['config']->set('database.default', 'sqlite');
    $this->app['config']->set('database.connections.sqlite.database', ':memory:');
    $this->artisan('migrate');
    
    // Insere alguns usuários na base de dados
    User::factory(3)->create();
  }

  /**
   * A basic feature test example.
   */
  public function test_get_users_endpoint(): void
  {
    $response = $this->getJson('/api/users');
    $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
  }
}
