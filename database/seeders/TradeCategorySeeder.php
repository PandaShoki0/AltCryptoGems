<?php

namespace Database\Seeders;

use App\Models\TradeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TradeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['BTC', 'ETH', 'LTC', 'ETC', 'EOS', 'BCH', 'Others'];

        foreach ($names as $name) {
            TradeCategory::firstOrCreate(['name' => $name]);
        }
    }
}
