<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblpersona_per extends Model
{
    protected $table = 'tblpersona_per';
    protected $primaryKey='per_id';

    protected $fillable = [
        'per_tipodocumento','per_documento','per_razonsocial','per_nombres','per_apaterno','per_amaterno','per_email','per_telefonos'
    ];

    protected $appends = ['nombre_completo'];

    public function getNombreCompletoAttribute()
    {
    	//return $this->attributes['per_tipodocumento'] == 'DNI'; //some logic to return numbers -> RETURN TRUE
    	if($this->attributes['per_tipodocumento'] == 'DNI'):
    		return $this->attributes['per_nombres'].' '.$this->attributes['per_apaterno'].' '.$this->attributes['per_amaterno'];
    	else:
    		return $this->attributes['per_razonsocial'];
		endif;
    }

    public function setPerRazonsocialAttribute($value)
	{
	    $this->attributes['per_razonsocial'] = strtoupper($value);
	}

    public function setPerNombresAttribute($value)
	{
	    $this->attributes['per_nombres'] = strtoupper($value);
	}

	public function setPerApaternoAttribute($value)
	{
	    $this->attributes['per_apaterno'] = strtoupper($value);
	}

	public function setPerAmaternoAttribute($value)
	{
	    $this->attributes['per_amaterno'] = strtoupper($value);
	}

	public function setPerEmailAttribute($value)
	{
	    $this->attributes['per_email'] = strtoupper($value);
	}
}
