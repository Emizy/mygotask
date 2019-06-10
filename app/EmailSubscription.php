<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class EmailSubscription extends Model
{
    public function user(){
        return $this->belongsTo('mygotask\User');
    }
}
