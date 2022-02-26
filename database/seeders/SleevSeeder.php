<?php

namespace Database\Seeders;

use App\Models\Sleev;
use Illuminate\Database\Seeder;

class SleevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'بلند',
            'بدون آستین',
            'سه ربع',
            'کوتاه'
        ];
        foreach($items as $item)
            Sleev::create([
                'name' => $item
            ]);
    }
}
