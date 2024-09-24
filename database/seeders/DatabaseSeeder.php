<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Pest\Laravel\post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $moo = User::where('username', 'moo')->first();
        $followers = User::factory()
            ->hasPosts(10)
            ->count(1000)
            ->create();
        foreach ($followers as $follower) {
            $follower->following()->attach($moo->id);
        }
    }
}
