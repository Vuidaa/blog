<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

use Carbon\Carbon;

class Post extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    public function comments()
    {
    	return $this->hasMany('Blog\Comment')->orderBy('created_at','DESC');

    }
    public function category()
    {
    	return $this->belongsTo('Blog\Category');
    }
    public function user()
    {
        return $this->belongsTo('Blog\User');
    }

    public function tags()
    {
        return $this->belongsToMany('Blog\Tag','tag_post');
    }

    public function dateFormator()
    {
        $now = Carbon::now();

        if($now->diffInDays($this->created_at) > 5)
        {
            return $this->created_at->toFormattedDateString(); 
        }

        return $this->created_at->diffForHumans();
    }
}
