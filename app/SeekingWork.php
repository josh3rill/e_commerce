<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;

class SeekingWork extends Model implements Viewable
{
    use InteractsWithViews;

    protected $removeViewsOnDelete = true;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
    public function getTotalLikesAttribute()
    {
       return $this->likes->count();
    }
    public function likes(){
        return $this->hasMany('\App\Like', 'seekingwork_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }
}
