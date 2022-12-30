@php
$blogs = App\Models\Blog::latest()->limit(5)->get();
@endphp
<h4 class="widget-title">Recent Blog</h4>
<ul class="rc__post">
    @foreach ($blogs as $item)
        <li class="rc__post__item">
            <div class="rc__post__thumb">
                <a href="{{ route('blog.details',$item->id) }}"><img src="{{asset($item->blog_image)}}" alt=""></a>
            </div>
            <div class="rc__post__content">
                <h5 class="title"><a href="{{ route('blog.details',$item->id) }}">{{ $item->blog_title }}</a></h5>
                <span class="post-date"><i class="fal fa-calendar-alt"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
            </div>
        </li>
    @endforeach
</ul>