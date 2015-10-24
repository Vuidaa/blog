<aside class="col-md-4">
  <div class="widget widget-recent-posts">    
    <h3 class="widget-title">Recent Posts</h3>    
    <ul>
      @if(!empty($latestPosts))
        @foreach($latestPosts as $latest)
          <li>
            <a href="{{ url('post/'.$latest->slug) }}">{{$latest->title}}</a>
          </li>
        @endforeach
      @endif
    </ul>
  </div>
  <div class="widget widget-category">    
    <h3 class="widget-title">Category</h3>    
    <ul>
      @if(!$categories->isEmpty())
        @foreach($categories as $category)
          <li>
            <a href="{{ url('filter/category/'.$category->slug) }}">{{$category->category}}</a>
          </li>
        @endforeach
      @endif
    </ul>
  </div>
  <div class="widget">    
    <h3 class="widget-title">Posts tags</h3>    
    @if(!$tags->isEmpty())
        @foreach($tags as $tag)
         <small><a href="">{{$tag->tag}}</a>,</small> 
        @endforeach
      @endif
  </div>
</aside>