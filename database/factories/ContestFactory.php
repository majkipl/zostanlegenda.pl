<?php

/** @var Factory $factory */

use App\Model;
use App\Models\Contest;
use App\Models\Whence;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Carbon;

$factory->define(Contest::class, function (Faker $faker) {

    $maxDate = Carbon::now()->subYears(18)->subDay(); // Odejmuje 18 lat i 1 dzień
    $whence_id = Whence::select('id')->inRandomOrder()->pluck('id')->first();

    $obj = [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'birthday' => $faker->dateTimeBetween($maxDate)->format('d-m-Y'),
        'email' => $faker->unique()->safeEmail,
        'whence_id' => $whence_id,
        'title' => $faker->text(128),
        'message' => $faker->text(500),
        'img_tip' => null,
        'video_url' => null,
        'video_type' => null,
        'video_id' => null,
        'video_image_id' => null,
        'legal_1' => true,
        'legal_2' => true,
        'legal_3' => true,
        'legal_4' => true,
    ];

    switch ($faker->numberBetween(1,3))
    {
        case 1: // image
            $obj['img_tip'] = 'tips/z8cQ1QnxrY6BlXkKZeTNN5WFzciIzVuRFDmfWEvu.jpg';
            break;
        case 2: // youtube
            $obj['video_url'] = 'https://www.youtube.com/watch?v=u3z2Du1cPhQ';
            $obj['video_type'] = 'youtube';
            $obj['video_id'] = 'u3z2Du1cPhQ';
            $obj['video_image_id'] = 'https://img.youtube.com/vi/u3z2Du1cPhQ/default.jpg';
            break;
        case 3: //vimeo
            $obj['video_url'] = 'https://vimeo.com/19568852';
            $obj['video_type'] = 'vimeo';
            $obj['video_id'] = '19568852';
            $obj['video_image_id'] = 'https://i.vimeocdn.com/video/124129987-95f23da9ca798369e00ad9d61fe7bdd02507358ef4dc8aa49841d74da26c13c2-d_640';
            break;
    }

    return $obj;
});
