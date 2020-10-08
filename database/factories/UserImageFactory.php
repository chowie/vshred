<?php

namespace Database\Factories;

use App\Models\UserImage;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::all()->random()->id,
            'image_path' => $this->faker->imageUrl($width = 640, $height = 480) // 'http://lorempixel.com/640/480/'
        ];
    }
}
