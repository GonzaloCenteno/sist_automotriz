<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class InventarioVehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'TARJETA DE PROPIEDAD',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'REVISION TÉCNICA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'PERMISO DE LUNAS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'SOAT',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'RADIO',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'CD/CAJA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'ENCENDEDOR',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'CENICERO',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'PARASOLES',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'CLAXON',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'PLUMILLAS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'RELOJ',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'SEGURIDAD DE RUEDAS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'ESPEJOS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'CINTURON DE SEGURIDAD',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'ALARMA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'DIRECCIONALES',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'LLANTA DE REPUESTO',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'EMBLEMAS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'TAPA DE GASOLINA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'GATA/PALANCA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'LLAVE DE RUEDA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
        DB::table('tblinventariovehiculo_ive')->insert([
            'ive_descripcion' => 'HERRAMIENTAS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
    }
}
