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
    protected $signature = 'subscription-check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the subscription status of all the schools';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $schools = School::with(['subscriptions' => function ($query) {
            $query->where('status', 'paid')
                ->where('end_date', '<', now())
                ->where('status', '!=', 'finished');
        }])->whereHas('subscriptions', function ($query) {
            $query->where('status', 'paid')
            ->where('end_date', '<', now())
            ->where('status', '!=', 'finished');
        })->get();

        // dd($schools);

        foreach ($schools as $school)
        {
            $updated = $school->update(['payment_status' => 'expired']);

            if ($updated) {
                \Log::channel('cron')->info("School ID {$school->id} payment_status updated to expired.");
            } else {
                \Log::channel('cron')->warning("Failed to update payment_status for School ID {$school->id}.");
            }

            foreach ($school->subscriptions as $subscription)
            {
                $subscription->update(['status' => 'finished']);
            }
        }
    }
}
