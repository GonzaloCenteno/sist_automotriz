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
            $table->enum('per_tipodocumento',['DNI','RUC']);
            $table->text('per_documento')->unique();
            $table->text('per_razonsocial')->nullable();
            $table->text('per_nombres')->nullable();
            $table->text('per_apaterno')->nullable();
            $table->text('per_amaterno')->nullable();
            $table->text('per_email');
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
