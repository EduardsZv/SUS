<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Arsts;


class ArstsTableSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        $arsts = [
            ['DarbinieksID' => 11],
            ['DarbinieksID' => 12, 'IrGalvenais' => 1],
            ['DarbinieksID' => 13],
            ['DarbinieksID' => 14],
            ['DarbinieksID' => 15],
        ];

        foreach ($arsts as $arst) {
            Arsts::create($arst);
        }
    }
}
