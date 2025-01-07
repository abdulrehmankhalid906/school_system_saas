<?php

namespace Database\Seeders;

use App\Models\FeeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $feetypes = ['Monthly Fee','Board Fee','Fine Fee'];

        foreach($feetypes as $fee)
        {
            FeeType::create([
                'title' => $fee,
            ]);
        }
    }
}
