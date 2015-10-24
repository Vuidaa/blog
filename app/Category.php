<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;

class Category extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'category',
        'save_to'    => 'slug',
    ];

    public function posts()
    {
    	return $this->hasMany('Blog\Post');
    }
}
