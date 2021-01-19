<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Tblmaterial_mat;

class Tblfichamaterial_fma extends Pivot
{
    protected $table = 'tblfichamaterial_fma';

    protected $fillable = [
        'fma_tipo','fma_cantidad'
    ];

    public function materiales()
    {
        return $this->hasMany(Tblmaterial_mat::class,'mat_id','mat_id');
    }

}
