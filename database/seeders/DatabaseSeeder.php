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
        // $this->call(InitUserSeeder::class);
        // $this->call(CategorySeeder::class);
        // $this->call(AreaSeeder::class);
        // $this->call(SizeSeeder::class);
        // $this->call(MaterialSeeder::class);
        // $this->call(DesignSeeder::class);
        $this->call(SleevSeeder::class);
    }
}
