<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'         => 'ini adalah title',
            'slug'          => '',
            'thumbnail'     => 'storage/photos/1/1.jpg',
            'description'   => $this->faker->paragraph(5,10),
            'content'       => collect($this->faker->paragraphs(mt_rand(5,10)))
                                ->map(function ($p){
                                    return "<p>$p</p>";
                                })->implode(''),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
            'user_id'       => mt_rand(1,4)
        ];
    }
}
