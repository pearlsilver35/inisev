<?php

namespace App\Console\Commands;

use App\Mail\NewPostNotification;
use App\Models\Post;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostNotifications extends Command
{
    protected $signature = 'posts:notify';
    protected $description = 'Send new post notifications to subscribers';

    public function handle()
    {
        $websites = Website::with('subscribers.user')->get();

        foreach ($websites as $website) {
            $newPosts = $website->posts()->where('notified', false)->get();

            foreach ($newPosts as $post) {
                foreach ($website->subscribers as $subscription) {
                    Mail::to($subscription->user->email)->send(new NewPostNotification($post));
                }
                $post->update(['notified' => true]);
            }
        }

        $this->info('Notifications sent successfully');
    }
}
