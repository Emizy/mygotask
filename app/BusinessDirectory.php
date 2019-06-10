<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class BusinessDirectory extends Model
{
    public function user(){
        return $this->belongsTo('mygotask\User');
    }
}
