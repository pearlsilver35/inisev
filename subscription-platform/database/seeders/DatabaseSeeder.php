<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Website;
use App\Models\Subscription;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Website::factory(5)->create();

        $users = User::factory(10)->create();

        foreach ($users as $user) {
            $websiteIds = Website::pluck('id')->toArray();
            $randomWebsiteId = array_rand($websiteIds);
            Subscription::create(['user_id' => $user->id, 'website_id' => $websiteIds[$randomWebsiteId]]);
        }

        Website::all()->each(function ($website) {
            $website->posts()->createMany(
                Post::factory(5)->make()->toArray()
            );
        });
    }
}
