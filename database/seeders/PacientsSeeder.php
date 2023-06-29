<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PacientsSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into Pacients table
        DB::table('pacients')->insert([
            [
                'PersonasKods' => '050493-64525',
                'Vards' => 'Anna',
                'Uzvards' => 'Berzina',
                'Vecums' => 30,
                'Adrese' => 'Brīvības iela 23',
            ],
            [
                'PersonasKods' => '230978-85243',
                'Vards' => 'Juris',
                'Uzvards' => 'Lapins',
                'Vecums' => 44,
                'Adrese' => 'Krasta iela 5',
            ],
            [
                'PersonasKods' => '010595-25492',
                'Vards' => 'Inga',
                'Uzvards' => 'Ozola',
                'Vecums' => 27,
                'Adrese' => 'Rīgas iela 12',
            ],
            [
                'PersonasKods' => '070661-48032',
                'Vards' => 'Janis',
                'Uzvards' => 'Bērziņš',
                'Vecums' => 61,
                'Adrese' => 'Jēkabpils iela 8',
            ],
            [
                'PersonasKods' => '121181-54732',
                'Vards' => 'Līga',
                'Uzvards' => 'Pētersone',
                'Vecums' => 42,
                'Adrese' => 'Dārza iela 17',
            ],
            [
                'PersonasKods' => '130886-25680',
                'Vards' => 'Māris',
                'Uzvards' => 'Līdaks',
                'Vecums' => 37,
                'Adrese' => 'Rūpniecības iela 31',
            ],
            [
                'PersonasKods' => '260272-69367',
                'Vards' => 'Elīza',
                'Uzvards' => 'Mūrniece',
                'Vecums' => 51,
                'Adrese' => 'Pasta iela 4',
            ],
            [
                'PersonasKods' => '010100-35362',
                'Vards' => 'Artūrs',
                'Uzvards' => 'Bērzs',
                'Vecums' => 23,
                'Adrese' => 'Lielā iela 10',
            ],
            [
                'PersonasKods' => '290289-12987',
                'Vards' => 'Linda',
                'Uzvards' => 'Priede',
                'Vecums' => 34,
                'Adrese' => 'Zemgales iela 6',
            ],
            [
                'PersonasKods' => '070794-69420',
                'Vards' => 'Miks',
                'Uzvards' => 'Liepiņš',
                'Vecums' => 28,
                'Adrese' => 'Katoļu iela 3',
            ],
        ]);
    }
}
