<?php

namespace Tests\Feature\Api\Authenticated;

use App\Enums\UserRole;
use App\Models\User;
use Tests\TestCase;

class AuthenticatedTestCase extends TestCase
{

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = factory(User::class)->create([
            'role' => UserRole::ADMIN
        ]);

        $this->actingAs($this->user);
    }
}
