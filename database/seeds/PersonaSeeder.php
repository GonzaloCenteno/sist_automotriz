<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblpersona_per')->insert([
            'per_tipodocumento' => 'DNI',
            'per_documento' => '00000000',
            'per_razonsocial' => 'MGC',
            'per_nombres' => 'MGC',
            'per_apaterno' => '-',
            'per_amaterno' => '-',
            'per_email' => '-',
            'per_telefonos' => '-',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
    }
}
