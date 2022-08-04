<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tourism extends Model
{
    protected $fillable = [
    	'name',
    	'region',
    	'description',
    	'body',
    	'thumb',
    	'images',
    	'slug',
    ];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
