<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referal extends Model
{
	    protected $guarded = [];

 	/**
     * Get the parent commentable model (post or video).
     */
    public function referalable()
    {
        return $this->morphTo();
    }

     public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function hasBadge()
    {
        return $this->hasMany('App\Badge');
    }

    // public function()
    // {
    //     return $this->belongsTo('App\Agent');
    // }

}
