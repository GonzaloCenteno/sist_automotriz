<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaAdjuntoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfichaarchivo_far', function (Blueprint $table) {
            $table->bigIncrements('far_id');
            $table->bigInteger('fic_id')->unsigned()->required();
            $table->bigInteger('arc_id')->unsigned()->required();

            $table->foreign('fic_id')->references('fic_id')->on('tblficha_fic');
            $table->foreign('arc_id')->references('arc_id')->on('tblarchivo_arc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblfichaarchivo_far');
    }
}
