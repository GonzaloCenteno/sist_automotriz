<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tblpersona_per extends Model
{
    protected $table = 'tblpersona_per';
    protected $primaryKey='per_id';

    protected $fillable = [
        'per_dni','per_nombres','per_apaterno','per_amaterno','per_email','per_direccion','per_telefonos'
    ];

    public function getNombreCompletoAttribute()
    {
        return $this->attributes['per_nombres'].' '.$this->attributes['per_apaterno'].' '.$this->attributes['per_amaterno'];
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

	public function setPerDireccionAttribute($value)
	{
	    $this->attributes['per_direccion'] = strtoupper($value);
	}
}
