<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblempresa_emp', function (Blueprint $table) {
            $table->bigIncrements('emp_id');
            $table->text('emp_nombre');
            $table->text('emp_titulo');
            $table->text('emp_imagen');
            $table->text('emp_direccion');
            $table->string('emp_telefono');
            $table->string('emp_correo');
            $table->string('emp_web');
            $table->text('emp_horario');
            $table->text('emp_descripcion');
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
        Schema::dropIfExists('tblempresa_emp');
    }
}
