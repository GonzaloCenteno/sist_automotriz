<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tblinventariovehiculo_ive extends Model
{
	use SoftDeletes;
	
    protected $table = 'tblinventariovehiculo_ive';
    protected $primaryKey='ive_id';

    protected $fillable = [
        'ive_descripcion'
    ];

    public function setIveDescripcionAttribute($value)
	{
	    $this->attributes['ive_descripcion'] = strtoupper($value);
	}
}
