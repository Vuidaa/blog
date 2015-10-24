<?php

namespace Blog\Jobs;

use Blog\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use Blog\Category;
use Blog\Tag;
use Blog\Post;
use Auth;

class CreatePost extends Job implements SelfHandling
{

    protected $req;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($req)
    {
        $this->req = $req;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $category = Category::findOrFail($this->req->input('category'));

        $tags = explode(',', $this->req->input('tags'));

        $tagsCollection = Tag::lists('tag','id');

        $tagsToAttach = [];

        foreach ($tags as $key => $value){
            
            $value = trim(ucfirst($value));

            $tag = $tagsCollection->search($value);

            if($tag)
            {
                //echo $tag;
                $tagsToAttach[] = $tag;
            }
            else
            {
                $tag = new Tag;
                $tag->tag = $value;
                $tag->save();

                $tagsToAttach[] = $tag->id;
            }
        }

        $post = new Post;
        $post->title = $this->req->input('title');
        $post->user_id = Auth::user()->id;
        $post->body = $this->req->input('post');

        $category->posts()->save($post);
        $post->tags()->attach($tagsToAttach);

        return true;
    }
}
