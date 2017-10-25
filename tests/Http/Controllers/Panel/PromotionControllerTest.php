<?php

namespace Tests\Http\Controllers\Panel;

use App\Models\Promotion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\Feature\Panel\PanelBaseTestCase;

class PromotionControllerTest extends PanelBaseTestCase
{
    use RefreshDatabase;

    public $route = 'back.promotion';

    public $model = Promotion::class;

    public function user_has_not_access_to_create()
    {
    }

    public function user_has_access_to_create()
    {
    }

    public function user_has_not_access_to_edit()
    {
    }

    public function user_has_access_to_edit()
    {
    }

    public function user_has_access_to_edit_and_not_exist_id()
    {
    }
}
