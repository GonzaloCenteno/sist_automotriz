<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblempresa_emp extends Model
{
    protected $table = 'tblempresa_emp';
    protected $primaryKey='emp_id';

    protected $fillable = [
        'emp_nombre','emp_titulo','emp_imagen','emp_direccion','emp_telefono','emp_correo','emp_web','emp_horario','emp_descripcion'
    ];
}
