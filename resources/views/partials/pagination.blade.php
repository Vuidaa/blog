@if ($paginator->lastPage() > 1)
<center>
    <p>Pages</p>
       @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            @if($i == $paginator->lastPage())
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a> 
            @else
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a> , 
            @endif
        @endfor
</center>
@endif