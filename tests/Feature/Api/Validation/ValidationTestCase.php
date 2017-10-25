<?php

namespace Tests\Feature\Api\Validation;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

class ValidationTestCase extends TestCase
{
    /**
     * @param $data
     * @param $requestClass
     * @return void
     */
    protected function runValidationTest($data, $requestClass)
    {
        $validator = Validator::make($data, (new $requestClass())->rules());
        $this->assertFalse($validator->fails());
    }

    /**
     * @param $data
     * @param $requestClass
     * @return void
     */
    protected function expectValidationException($data, $requestClass)
    {
        $this->expectException(ValidationException::class);
        Validator::make($data, (new $requestClass())->rules())->validate();
    }

    protected function createTestFile($filename, $size)
    {
        Storage::fake('public');

        return UploadedFile::fake()->create($filename, $size);
    }
}
