<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\BrasilAPIService;

class BrasilAPITest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = (new BrasilAPIService())->getResponse('MT');

        $response->assertStatus(200);
    }
}
