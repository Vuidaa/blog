<?php

namespace Blog\Jobs;

use Blog\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

use Blog\Category;
use Blog\Tag;
use Blog\Post;
use Auth;

class EditPost extends Job implements SelfHandling
{
    protected $req;

    protected $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($req, $post)
    {
        $this->req = $req;
        $this->post = $post;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->post->category_id != $this->req->input('category'))
        {
            $category = Category::findOrFail($this->req->input('category'));
            $this->post->category()->associate($category);
        }

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

        $this->post->title = $this->req->input('title');
        $this->post->user_id = Auth::user()->id;
        $this->post->body = $this->req->input('post');

        $this->post->tags()->detach();
        $this->post->tags()->attach($tagsToAttach);
        $this->post->save();

        return true;
    }
}
