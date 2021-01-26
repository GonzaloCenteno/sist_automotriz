<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\Tblficha_fic;
use App\Models\Tblarchivo_arc;

class Tblfichaarchivo_far extends Model
{
    protected $table = 'tblfichaarchivo_far';
    protected $primaryKey='far_id';

    protected $fillable = [
        'fic_id','arc_id'
    ];

    public function fichas()
    {
        return $this->hasMany(Tblficha_fic::class,'fic_id','fic_id');
    }

    public function archivos()
    {
        return $this->hasMany(Tblarchivo_arc::class,'arc_id','arc_id');
    }

}
