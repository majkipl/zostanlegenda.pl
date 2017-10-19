<?php

namespace Tests\Http\Controllers\Api;

use Tests\Feature\Api\Authenticated\AuthenticatedTestCase;

class ShopControllerTest extends AuthenticatedTestCase
{

    /** @test */
    public function is_not_authorization()
    {
        $response = $this->get(route('api.shop'));
        $response->assertStatus(302);
    }

    /** @test */
    public function is_authorization()
    {
        $queryParams = [
            'searchable' => ['id', 'name'],
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->user->api_token,
        ])->getJson(route('api.shop') . '?' . http_build_query($queryParams));

        $response->assertStatus(200);
    }

    /** @test */
    public function is_no_valid_params()
    {
        $queryParams = [];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->user->api_token,
        ])->getJson(route('api.shop') . '?' . http_build_query($queryParams));

        $response->assertStatus(422);
    }
}

