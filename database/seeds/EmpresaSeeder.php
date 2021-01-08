<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblempresa_emp')->insert([
            'emp_nombre'       	=> 'MGC AUTOMOTRIZ',
            'emp_titulo'       	=> 'Automotive Electronic Diagnosis',
            'emp_imagen'        => 'img/logo_principal.png',
            'emp_direccion'     => 'Jr. Tejada N° 330 - Barranco',
            'emp_telefono'      => '947288602 / 947368511',
            'emp_correo'        => 'informes@mgc.com.pe',
            'emp_web'        	=> 'www.mgc.com.pe',
            'emp_horario'       => 'Lunes a Viernes 8 a.m. - 5.30 p.m. Sábados: 8.30 a.m. - 12.00 p.m.',
            'emp_descripcion'   => 'Autorizo a MGC Automotive Electronic Diagnosis a realizar los trabajos arriba indicados, asi como a suministrar los repuestos y materiales necesarios. Tambien autorizo a efectuar las pruebas de carretera y/o ciudad ó trasladar mi vehiculo a otro de sus locales en caso el servicio asi lo requiera.
            	MGC Automotive Electronic Diagnosis podrá cobrarme S/30.00 diarios por concepto de almacenaje y guardianía a partir del tercer dia de haber sido informado por cualquier medio del término de los trabajos.',
            'created_at'   => Carbon::now(),
            'updated_at'   => Carbon::now()
        ]);
    }
}
