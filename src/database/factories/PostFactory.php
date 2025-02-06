<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Random\RandomException;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * @throws RandomException
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(random_int(3, 10));
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->paragraphs(random_int(3, 7), true),
            'user_id' => User::factory(),
        ];
    }
}
