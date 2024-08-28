<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create admin user
        \App\Models\User::factory(10)->create([
            'name' => 'Pham Thang ',
            'email' => 'phamthang@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
