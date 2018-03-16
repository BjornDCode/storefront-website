<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $guarded = [];

    public function owner() 
    {
        return $this->belongsTo(Customer::class, 'id');
    }

}
