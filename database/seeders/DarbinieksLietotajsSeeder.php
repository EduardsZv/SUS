<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DarbinieksLietotajsSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        // Insert data into Darbinieks table
        DB::table('darbinieks')->insert([
            ['Vards' => 'Enija', 'Uzvards' => 'Kambala', 'Darbs' => 'Medmasa'],
            ['Vards' => 'Sarlote', 'Uzvards' => 'Kalnina', 'Darbs' => 'Medmasa'],
            ['Vards' => 'Maikls', 'Uzvards' => 'Cipulis', 'Darbs' => 'Medmasa'],
            ['Vards' => 'Amelija', 'Uzvards' => 'Bumbiere', 'Darbs' => 'Medmasa'],
            ['Vards' => 'Miks', 'Uzvards' => 'Aboltins', 'Darbs' => 'Medbralis'],
            ['Vards' => 'Timurs', 'Uzvards' => 'Girgens', 'Darbs' => 'Medbralis'],
            ['Vards' => 'Rezija', 'Uzvards' => 'Roga', 'Darbs' => 'Medmasa'],
            ['Vards' => 'Edgars', 'Uzvards' => 'Aboltins', 'Darbs' => 'Medbralis'],
            ['Vards' => 'Kirils', 'Uzvards' => 'Gilis', 'Darbs' => 'Medbralis'],
            ['Vards' => 'Matilde', 'Uzvards' => 'Karklina', 'Darbs' => 'Medmasa'],
            ['Vards' => 'Eriks', 'Uzvards' => 'Dabolins', 'Darbs' => 'Arsts'],
            ['Vards' => 'Zane', 'Uzvards' => 'Irbe', 'Darbs' => 'Arsts'],
            ['Vards' => 'Kristaps', 'Uzvards' => 'Burtnieks', 'Darbs' => 'Arsts'],
            ['Vards' => 'Justine', 'Uzvards' => 'Lice', 'Darbs' => 'Arsts'],
            ['Vards' => 'Janis', 'Uzvards' => 'Ozols', 'Darbs' => 'Arsts'],
            ['Vards' => 'Girts', 'Uzvards' => 'Karnitis', 'Darbs' => 'Admins'],
        ]);

        // Insert data into Lietotajs table
        DB::table('lietotajs')->insert([
            ['Lietotajvards' => 'ek01', 'Parole' => '9wS5t3Rv', 'DarbinieksID' => 1],
            ['Lietotajvards' => 'sk02', 'Parole' => '6uP9r2Sj', 'DarbinieksID' => 2],
            ['Lietotajvards' => 'mc03', 'Parole' => '2sK6p8Om', 'DarbinieksID' => 3],
            ['Lietotajvards' => 'ab04', 'Parole' => '7rK9o1Nj', 'DarbinieksID' => 4],
            ['Lietotajvards' => 'ma05', 'Parole' => '3oJ5n9Lm', 'DarbinieksID' => 5],
            ['Lietotajvards' => 'tg06', 'Parole' => '1mG3j6Hk', 'DarbinieksID' => 6],
            ['Lietotajvards' => 'rr07', 'Parole' => '5kD6m4Ie', 'DarbinieksID' => 7],
            ['Lietotajvards' => 'ea08', 'Parole' => '9iD8j2Gh', 'DarbinieksID' => 8],
            ['Lietotajvards' => 'kg09', 'Parole' => '7gB6c8Hf', 'DarbinieksID' => 9],
            ['Lietotajvards' => 'mk10', 'Parole' => '3cB2e4Fa', 'DarbinieksID' => 10],
            ['Lietotajvards' => 'ed11', 'Parole' => '6eD1a7Bf', 'DarbinieksID' => 11],
            ['Lietotajvards' => 'zi12', 'Parole' => '8aD7b9fE', 'DarbinieksID' => 12],
            ['Lietotajvards' => 'kb13', 'Parole' => '4eA9b2fC', 'DarbinieksID' => 13],
            ['Lietotajvards' => 'jl14', 'Parole' => '2aC9b7Df', 'DarbinieksID' => 14],
            ['Lietotajvards' => 'jo15', 'Parole' => '6cD8b9fA', 'DarbinieksID' => 15],
            ['Lietotajvards' => 'admin', 'Parole' => 'admin', 'DarbinieksID' => 16],
        ]);
    }
}
