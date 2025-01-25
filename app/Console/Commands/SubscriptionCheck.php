<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\School;
use App\Models\Subscription;
use Illuminate\Console\Command;

class SubscriptionCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:subscription-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $subscription = User::whereHas('school.subscriptions', function ($query) {
            $query->where('status', 'paid')->where('end_date', '<', now());
        })->with(['school.subscriptions' => function ($query) {
            $query->where('status', 'paid')->where('end_date', '<', now());
        }])->role('School')->get();

        foreach ($subscription as $user) {
            foreach ($user->school->subscriptions as $subscription) {
                $subscription->update(['status' => 'expired']);
            }
        }
    }
}
