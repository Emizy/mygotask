<?php

namespace mygotask;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function user()
    {
        return $this->belongsTo('mygotask\User');
    }

    public function businessdirectory()
    {
        return $this->belongsTo('mygotask\BusinessDirectory');
    }
}
