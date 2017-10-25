<?php

namespace Tests\Http\Requests;

use App\Http\Requests\StoreContestRequest;
use App\Models\Contest;
use App\Models\Whence;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\Feature\Api\Validation\ValidationTestCase;

use Illuminate\Support\Facades\Validator;

class StoreContestRequestTest extends ValidationTestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @param array $arr
     * @param array $without
     * @return array
     */
    public function getData(array $arr = [], array $without = []): array
    {
        $whence = factory(Whence::class)->create();

        $data = [
            'firstname' => $this->faker->firstName,
            'lastname' => $this->faker->lastName,
            'birthday' => now()->subYears(18)->format('d-m-Y'),
            'email' => $this->faker->word . '@gmail.com',
            'whence' => $whence->id,
            'title' => $this->faker->text(128),
            'message' => $this->faker->text(400),
            'img_tip' => $this->createTestFile('tip.jpg', 1024),
            'legal_1' => true,
            'legal_2' => true,
            'legal_3' => true,
            'legal_4' => true,
        ];

        foreach ($without as $item) {
            if (array_key_exists($item, $data)) {
                unset($data[$item]);
            }
        }

        return array_merge($data, $arr);
    }

    /** @test */
    public function validation_pass_for_valid_data()
    {
        $data = $this->getData();

        $validator = Validator::make($data, (new StoreContestRequest())->rules());

        $this->assertFalse($validator->fails());
    }

    /** @test */
    public function validation_fails_if_firstname_is_not_exists()
    {
        $data = $this->getData([],['firstname']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_firstname_is_not_a_string()
    {
        $data = $this->getData([
            'firstname' => $this->faker->numberBetween(1,100)
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_firstname_is_less_that_min_length()
    {
        $data = $this->getData([
            'firstname' => Str::random(2)
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_firstname_is_exceeds_max_length()
    {
        $data = $this->getData([
            'firstname' => Str::random(129),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_lastname_is_not_exists()
    {
        $data = $this->getData([],['lastname']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_lastname_is_not_a_string()
    {
        $data = $this->getData([
            'lastname' => $this->faker->numberBetween(1,100)
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_lastname_is_less_that_min_length()
    {
        $data = $this->getData([
            'lastname' => Str::random(2)
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_lastname_is_exceeds_max_length()
    {
        $data = $this->getData([
            'lastname' => Str::random(129),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_birthday_is_not_exists()
    {
        $data = $this->getData([],['birthday']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_birthday_is_no_date_format()
    {
        $data = $this->getData([
            'birthday' => now()->format('Y-m-d'),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_birthday_is_less_that_18_years()
    {
        $data = $this->getData([
            'birthday' => now()->format('d-m-Y'),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_email_is_not_exists()
    {
        $data = $this->getData([],['email']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_email_is_not_rfc()
    {
        $data = $this->getData([
            'email' => Str::random(16),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_email_is_not_unique()
    {
        $contest = factory(Contest::class)->create();

        $data = $this->getData([
            'email' => $contest->email,
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_whence_is_not_exists()
    {
        $data = $this->getData([],['whence']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_whence_is_not_numeric()
    {
        $data = $this->getData([
            'whence' => $this->faker->word,
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_whence_is_not_exist_in_database()
    {
        $data = $this->getData([
            'whence' => 999,
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_title_is_not_exists()
    {
        $data = $this->getData([],['title']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_title_is_not_a_string()
    {
        $data = $this->getData([
            'title' => 123,
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_title_is_exceeds_max_length()
    {
        $data = $this->getData([
            'title' => Str::random(129),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_message_is_not_exists()
    {
        $data = $this->getData([],['message']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_message_is_not_a_string()
    {
        $data = $this->getData([
            'message' => 123,
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_message_is_exceeds_max_length()
    {
        $data = $this->getData([
            'message' => Str::random(501),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_img_tip_and_video_url_is_not_exist()
    {
        $data = $this->getData([],['img_tip', 'video_url']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_img_tip_is_not_file()
    {
        $data = $this->getData([
            'img_tip' => $this->faker->word,
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_img_tip_is_not_file_image()
    {
        $data = $this->getData([
            'img_tip' => $this->createTestFile('tip.pdf', 1024),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_img_tip_is_too_large()
    {
        $data = $this->getData([
            'img_tip' => $this->createTestFile('tip.pdf', 5000),
        ]);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_video_url_is_not_require_url()
    {
        $data = $this->getData([
            'video_url' => $this->faker->url,
        ]);
        unset($data['img_tip']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_video_url_is_not_url()
    {
        $data = $this->getData([
            'video_url' => $this->faker->word,
        ]);
        unset($data['img_tip']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_legal_1_is_exist()
    {
        $data = $this->getData([],['legal_1']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_legal_2_is_exist()
    {
        $data = $this->getData([],['legal_2']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_legal_3_is_exist()
    {
        $data = $this->getData([],['legal_3']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }

    /** @test */
    public function validation_fails_if_legal_4_is_exist()
    {
        $data = $this->getData([],['legal_4']);

        $this->expectValidationException($data, StoreContestRequest::class);
    }
}
