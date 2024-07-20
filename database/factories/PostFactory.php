<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Post::class;
    public function definition() {
        return [
        "title" => $this->faker->realText($maxNbChars = 20, $indexSize = 2),
        "description" => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
        'photo_url' => 'https://picsum.photos/id/237/600/400',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        }
}
