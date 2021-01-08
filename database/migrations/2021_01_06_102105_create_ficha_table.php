<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblficha_fic', function (Blueprint $table) {
            $table->bigIncrements('fic_id');
            $table->text('fic_facturara');
            $table->dateTime('fic_fecha');
            $table->bigInteger('per_id')->unsigned();
            $table->text('fic_marca');
            $table->text('fic_placa');
            $table->text('fic_modelo');
            $table->text('fic_color');
            $table->text('fic_km');
            $table->text('fic_nmotor');
            $table->text('fic_anio');
            $table->text('fic_nchasis');
            $table->text('fic_trabajosarealizar');
            $table->text('fic_inventariovehiculo');
            $table->text('fic_observaciones');
            $table->text('fic_nivelcombustible');
            $table->timestamps();

            $table->foreign('per_id')->references('per_id')->on('tblpersona_per');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblficha_fic');
    }
}
