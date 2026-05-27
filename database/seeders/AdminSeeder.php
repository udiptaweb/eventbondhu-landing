<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'eventbondhuindia@gmail.com'],
            [
                'name'     => 'Event Bondhu Admin',
                'password' => bcrypt('Admin@1234'),
            ]
        );

        $this->command->info('Admin seeded — email: eventbondhuindia@gmail.com  password: Admin@1234');
    }
}
