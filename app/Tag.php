<?php

namespace Blog;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;


class Tag extends Model implements SluggableInterface
{
    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'tag',
        'save_to'    => 'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany('Blog\Post','tag_post');
    }
}
