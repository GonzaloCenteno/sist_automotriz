<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ACEITE DE MOTOR',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);  

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ACEITE DE CAJA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ACEITE DE DIRECCION HIDRAULICA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'LIQUIDO DE FRENO',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ACEITE DE CORONA',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ADITIVO LIMPIAPARABRISAS',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'LIQUIDO REFRIGERANTE',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ADITIVOS PARA A/C',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);

        DB::table('tblmaterial_mat')->insert([
            'mat_descripcion' => 'ADITIVOS PARA FUGA DE AGUA DE MOTOR',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
    }
}
