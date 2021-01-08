<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblpersona_per', function (Blueprint $table) {
            $table->bigIncrements('per_id');
            $table->text('per_dni')->unique();
            $table->text('per_nombres');
            $table->text('per_apaterno');
            $table->text('per_amaterno');
            $table->text('per_email');
            $table->text('per_direccion');
            $table->text('per_telefonos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblpersona_per');
    }
}
