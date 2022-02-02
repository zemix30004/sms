<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = Post::class;
    public function definition()
    {
        $title = $this->faker->realText(40, 5);
        $short_title = mb_strlen($title) > 30 ? mb_substr($title, 0, 30) . '...' : $title;
        $created = $this->faker->dateTimeBetween('-30 days', '-1 days');
        return [
            'title' => $title,
            'short_title' => $short_title,
            'author_id' => rand(1, 4),
            'description' => $this->faker->realText(rand(100, 500)),
            'created_at' => $created,
            'updated_at' => $created,
        ];
    }
}
