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
            'slug'          => 'u' . strtolower(Str::random(10)),
            'thumbnail'     => 'default.jpg',
            'description'   => 'Model factory sendiri umumnya digunakan untuk testing dan seeder. Tentunya, data yang dimasukkan merupakan data palsu yang bersumber dari librari Faker.',
            'content'       => 'Sebagai bahan percobaan, kita akan membuat model factory untuk model Blog. Ada beberapa langkah yang harus dilakukan sebelum Model Factory siap digunakan, mulai dari membuat migration untuk tabel blog, membuat model factory untuk blog itu sendiri, kemudian menggunakan Model Factory dalam Seeder.<p>Sebagai bahan percobaan, kita akan membuat model factory untuk model Blog. Ada beberapa langkah yang harus dilakukan sebelum Model Factory siap digunakan, mulai dari membuat migration untuk tabel blog, membuat model factory untuk blog itu sendiri, kemudian menggunakan Model Factory dalam Seeder.</p>Sebagai bahan percobaan, kita akan membuat model factory untuk model Blog. Ada beberapa langkah yang harus dilakukan sebelum Model Factory siap digunakan, mulai dari membuat migration untuk tabel blog, membuat model factory untuk blog itu sendiri, kemudian menggunakan Model Factory dalam Seeder.',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
            'user_id'       => 1
        ];
    }
}
