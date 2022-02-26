<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            'نخ پنبه',
            'کتان',
            'پلی استر',
            'ابریشم',
            'نایلون',
            'پشم',
            'ریون'
        ];
        foreach($items as $item)
            Material::create([
                'name' => $item
            ]);
    }
}
