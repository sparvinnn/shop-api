<?php

namespace Database\Seeders;

use App\Models\Design;
use Illuminate\Database\Seeder;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'ساده',
            'طرحدار'
        ];
        foreach($items as $item)
            Design::create([
                'name' => $item
            ]);
    }
}
