<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::firstOrCreate([
            'title' => 'Multiple Signals',
            'code'  => 'multiple_signals',
        ]);

        Permission::firstOrCreate([
            'title' => 'Multiple Signals Generate',
            'code'  => 'multiple_signals_generate',
        ]);

        Permission::firstOrCreate([
            'title' => 'Coin Pairs',
            'code'  => 'coin_pairs',
        ]);

        Permission::firstOrCreate([
            'title' => 'Trade Category',
            'code'  => 'trade_category',
        ]);
    }
}
