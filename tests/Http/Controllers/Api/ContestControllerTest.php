<?php

namespace Tests\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Models\Contest;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class ContestControllerTest extends TestCase
{
    use RefreshDatabase;

    public function getUser()
    {
        return factory(User::class)->create([
            'role' => UserRole::ADMIN
        ]);
    }

    /** @test */
    public function iit_response_http_forbidden_if_without_token_for_list_contest()
    {
        $response = $this->getJson(route('api.contest'));
        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function it_response_http_forbidden_if_token_wrong_for_list_contest()
    {
        $queryParams = [
            'searchable' => ['id', 'firstname', 'lastname'],
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . Str::random(32),
        ])->getJson(route('api.contest') . '?' . http_build_query($queryParams));

        $response
            ->assertStatus(Response::HTTP_FORBIDDEN);
    }

    /** @test */
    public function it_can_list_contest()
    {
        $contests = factory(Contest::class)->times(5)->create();

        $queryParams = [
            'searchable' => ['id', 'firstname', 'lastname'],
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->getUser()->api_token,
        ])->getJson(route('api.contest') . '?' . http_build_query($queryParams));

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount($contests->count(), 'rows');
    }

    /** @test */
    public function it_can_list_contest_verified()
    {
        $this->withExceptionHandling();

        $contests = factory(Contest::class)->times(5)->create([
            'token' => null
        ]);

        $queryParams = [
            'searchable' => ['id', 'firstname', 'lastname'],
        ];

        $response = $this->postJson(route('api.contests.veryfied') . '?' . http_build_query($queryParams));

        $response
            ->assertStatus(Response::HTTP_OK)
            ->assertJsonCount($contests->count(), 'rows');
    }

}
