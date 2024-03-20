<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Channel::create(['name' => 'SMS']);
        Channel::create(['name' => 'Email']);
        Channel::create(['name' => 'PushNotification']);
    }
}
