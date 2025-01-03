<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NotificationTemplate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notificationsTemp = [
            [
                'title' => 'Welcome Message',
                'message' => 'Dear User, We are delighted to say you thank you for registering the portal. Thank You.',
            ],
            [
                'title' => 'System Maintenance',
                'message' => 'Dear Users, As usual we have system maintenance 21-January 02:00 am to 11:00am. We are really sorry for any Inconvinces.',
            ],
        ];

        foreach ($notificationsTemp as $notificationTemp) {
            NotificationTemplate::create($notificationTemp);
        }
    }
}
