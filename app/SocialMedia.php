<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    public function user(){
        return $this->belongsTo('mygotask\User');
    }
}
