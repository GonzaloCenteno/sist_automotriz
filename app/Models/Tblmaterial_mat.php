<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tblficha_fic;

class Tblmaterial_mat extends Model
{
	use SoftDeletes;
	
    protected $table = 'tblmaterial_mat';
    protected $primaryKey='mat_id';

    protected $fillable = [
        'mat_descripcion'
    ];

    public function fichas()
    {
        return $this->belongsToMany(Tblficha_fic::class,'tblfichamaterial_fma','mat_id', 'fic_id');
    }

    public function setMatDescripcionAttribute($value)
	{
	    $this->attributes['mat_descripcion'] = strtoupper($value);
	}
}
