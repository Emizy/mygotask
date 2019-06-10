<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class CustomerOccupation extends Model
{
    public function user(){
        return $this->belongsTo('mygotask\User');
    }
}
