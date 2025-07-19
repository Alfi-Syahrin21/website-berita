<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Sdgs;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@seeder.com',
            ]);
        }

        $sdgIds = Sdgs::pluck('id');

        $thumbnails = [
            'image/pic1.png',
            'image/pic2.png',
            'image/pic3.png',
        ];

        for ($i = 0; $i < 30; $i++) {
            $title = fake()->sentence(6);
            $news = News::create([
                'title' => $title,
                'slug' => Str::slug($title) . '-' . Str::random(5),
                'thumbnail' => $thumbnails[array_rand($thumbnails)],
                'thumbnail_caption' => fake()->sentence(8),
                'content' => fake()->paragraphs(10, true),
                'quote' => fake()->sentence(12),
                'published_at' => now()->subDays(rand(1, 365)),
                'user_id' => $user->id,
                'publisher_name' => fake()->name(),
            ]);

            $news->sdgs()->attach(
                $sdgIds->random(rand(1, 3))->toArray()
            );
        }
    }
}
