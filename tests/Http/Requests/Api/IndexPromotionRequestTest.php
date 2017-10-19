<?php

namespace Tests\Http\Requests\Api;

use App\Http\Requests\Api\IndexPromotionRequest;
use Tests\Feature\Api\BootstrapTable\BootstrapTableTestCase;

class IndexPromotionRequestTest extends BootstrapTableTestCase
{

    /** @test */
    public function validation_pass_for_valid_data()
    {
        $data = [
            'searchable' => ['id','firstname','lastname','birthday','email','phone','address','city','zip','img_receipt','receiptnb','img_ean','category.name','product.name','shop.name','whence.name','created_at','legal_1','legal_2','legal_3','legal_4'],
            'offset' => 0,
            'limit' => 10,
            'sort' => 'id',
            'order' => 'asc',
            'search' => 'example search'
        ];

        $this->runValidationTest($data, IndexPromotionRequest::class);
    }

    /** @test */
    public function validation_fails_if_searchable_is_not_exists()
    {
        $data = [
            'searchable' => ['slug'],
            'offset' => 0,
            'limit' => 10,
            'sort' => 'id',
            'order' => 'asc',
            'search' => 'example search'
        ];

        $this->expectValidationException($data, IndexPromotionRequest::class);
    }

    /** @test */
    public function validation_fails_if_searchable_is_not_array()
    {
        $data = [
            'searchable' => 'id,name', // Should be an array
            'offset' => 0,
            'limit' => 10,
            'sort' => 'id',
            'order' => 'asc',
            'search' => 'example search'
        ];

        $this->expectValidationException($data, IndexPromotionRequest::class);
    }

    /** @test */
    public function validation_fails_if_offset_is_not_an_integer()
    {
        $data = [
            'searchable' => ['id', 'name'],
            'offset' => 'abc', // Should be an integer
            'limit' => 10,
            'sort' => 'id',
            'order' => 'asc',
            'search' => 'example search'
        ];

        $this->expectValidationException($data, IndexPromotionRequest::class);
    }

    /** @test */
    public function validation_fails_if_limit_is_not_an_integer()
    {
        $data = [
            'searchable' => ['id', 'name'],
            'offset' => 0,
            'limit' => 'abc', // Should be an integer
            'sort' => 'id',
            'order' => 'asc',
            'search' => 'example search'
        ];

        $this->expectValidationException($data, IndexPromotionRequest::class);
    }

    /** @test */
    public function validation_fails_if_sort_is_invalid()
    {
        $data = [
            'searchable' => ['id', 'name'],
            'offset' => 0,
            'limit' => 10,
            'sort' => 'invalid_column', // Should be 'id', 'name', or 'slug'
            'order' => 'asc',
            'search' => 'example search'
        ];

        $this->expectValidationException($data, IndexPromotionRequest::class);
    }

    /** @test */
    public function validation_fails_if_order_is_invalid()
    {
        $data = [
            'searchable' => ['id', 'name'],
            'offset' => 0,
            'limit' => 10,
            'sort' => 'id',
            'order' => 'invalid_order', // Should be 'asc' or 'desc'
            'search' => 'example search'
        ];

        $this->expectValidationException($data, IndexPromotionRequest::class);
    }
}
