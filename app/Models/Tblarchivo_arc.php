<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tblficha_fic;

class Tblarchivo_arc extends Model
{
    protected $table = 'tblarchivo_arc';
    protected $primaryKey='arc_id';

    protected $fillable = [
        'arc_nombre','arc_tipo','arc_url'
    ];

    public function fichas()
    {
        return $this->belongsToMany(Tblficha_fic::class,'tblfichaarchivo_far','arc_id', 'fic_id');
    }

}
