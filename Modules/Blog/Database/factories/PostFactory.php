<?php

namespace Modules\Blog\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Blog\Models\Post::class;

    protected static $namespace = 'Modules\\Blog\\Database\\factories\\';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentences(3, true),
            'description' => $this->faker->text('100'),
            'content' => $this->faker->text('1000'),
            'published_at' => $this->faker->dateTimeBetween('-1 year', '+1 year'),
            'slug' => $this->faker->slug(),
            'meta_title' => $this->faker->sentences(3, true),
            'meta_description' => $this->faker->text('100'),
            'meta_keyword' => $this->faker->words(10, true),
            'created_at' => $this->faker->dateTimeBetween('-3 year', '-2 year'),
            'updated_at' => $this->faker->dateTimeBetween('-3 year', '-2 year'),
        ];
    }
}
