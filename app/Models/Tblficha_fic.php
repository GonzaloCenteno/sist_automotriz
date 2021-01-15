<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tblpersona_per;
use Illuminate\Support\Str;

class Tblficha_fic extends Model
{
    protected $table = 'tblficha_fic';
    protected $primaryKey='fic_id';

    protected $fillable = [
        'fic_facturara','fic_fecha','per_id','fic_marca','fic_placa','fic_modelo','fic_color','fic_km','fic_nmotor','fic_anio','fic_nchasis','fic_trabajosarealizar','fic_inventariovehiculo','fic_observaciones','fic_nivelcombustible','fic_adjunto'
    ];

    public function persona()
    {
        return $this->hasOne(Tblpersona_per::class,'per_id','per_id');
    }

    public function setFicAdjuntoAttribute($imagen){
      	if($imagen !== null && $imagen !== '')
	        $bandera = Str::random(12);
	        $filename = $imagen->getClientOriginalName();
	        $fileserver = $bandera.'_'.$filename;
	        $imagen->move(public_path('adjuntos/'), htmlentities($fileserver));
	        $this->attributes['fic_adjunto'] = 'adjuntos/'.$fileserver;
    }

    public function setFicFacturaraAttribute($value)
	{
	    $this->attributes['fic_facturara'] = strtoupper($value);
	}

	public function setFicMarcaAttribute($value)
	{
	    $this->attributes['fic_marca'] = strtoupper($value);
	}

	public function setFicPlacaAttribute($value)
	{
	    $this->attributes['fic_placa'] = strtoupper($value);
	}

	public function setFicModeloAttribute($value)
	{
	    $this->attributes['fic_modelo'] = strtoupper($value);
	}

	public function setFicColorAttribute($value)
	{
	    $this->attributes['fic_color'] = strtoupper($value);
	}

	public function setFicObservacionesAttribute($value)
	{
	    $this->attributes['fic_observaciones'] = strtoupper($value);
	}
}
