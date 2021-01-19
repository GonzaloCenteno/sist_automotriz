<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblfichamaterial_fma', function (Blueprint $table) {
            $table->bigInteger('fic_id')->unsigned()->required();
            $table->bigInteger('mat_id')->unsigned()->required();
            $table->text('fma_tipo');
            $table->text('fma_cantidad');

            $table->foreign('fic_id')->references('fic_id')->on('tblficha_fic');
            $table->foreign('mat_id')->references('mat_id')->on('tblmaterial_mat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblfichamaterial_fma');
    }
}
