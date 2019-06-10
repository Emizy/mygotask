<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function user(){
        return $this->belongsTo('mygotask\User');
    }
}
