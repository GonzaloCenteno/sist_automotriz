<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tblpersona_per;

class Tblficha_fic extends Model
{
    protected $table = 'tblficha_fic';
    protected $primaryKey='fic_id';

    protected $fillable = [
        'fic_facturara','fic_fecha','per_id','fic_marca','fic_placa','fic_modelo','fic_color','fic_km','fic_nmotor','fic_anio','fic_nchasis','fic_trabajosarealizar','fic_inventariovehiculo','fic_observaciones','fic_nivelcombustible'
    ];

    public function persona()
    {
        return $this->hasOne(Tblpersona_per::class,'per_id','per_id');
    }
}
