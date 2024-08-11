<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EndpointLoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testSuccess(): void
    {
        $response = $this->post('api/login', [
            'username' => 'admin',
            'password' => 'pastibisa',
        ]);
        $response->assertJson([
            'status' => 'success',
            'message' => 'pesan success',
            'data' => [
                "token" => "5MpVulzkov",
                "admin" => [
                    "id" => "069c89b5-12e8-449f-95ee-60560bec449b",
                    "name" => "Admin",
                    "username" => "admin",
                    "phone" => "081234567890",
                    "email" => "admin@example.com"
                ]
            ]
        ]);
    }
}
