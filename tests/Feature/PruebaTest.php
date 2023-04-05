<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PruebaTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get('/user')
            ->assertStatus(200);
            $credentials = [
                "name" => "null",
                "email"=>"null"
                "password"=>"null"
            ];
            $response = $this->post('/user', $credentials);
    }
}
