<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class Refferal extends Model
{
    public function businessdirectory()
    {
        return $this->belongsTo('mygotask\User');
    }
}
