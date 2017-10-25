<?php

namespace Tests\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Models\Promotion;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class PromotionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function getUser()
    {
        return factory(User::class)->create([
            'role' => UserRole::ADMIN
        ]);
    }

    /** @test */
    public function it_response_http_forbidden_if_without_token_for_list_promotion()
    {
        $response = $this->getJson(route('api.promotion'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function it_response_http_forbidden_if_token_wrong_for_list_promotion()
    {
        $queryParams = [
            'searchable' => ['id', 'firstname', 'lastname'],
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . Str::random(32),
        ])->getJson(route('api.promotion') . '?' . http_build_query($queryParams));

        $response
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function it_can_list_promotion()
    {
        $promotion = factory(Promotion::class)->times(5)->create();

        $queryParams = [
            'searchable' => ['id', 'firstname', 'lastname'],
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->getUser()->api_token,
        ])->getJson(route('api.promotion') . '?' . http_build_query($queryParams));

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount($promotion->count(), 'rows');
    }
}
