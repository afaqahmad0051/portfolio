@php
    $categories = App\Models\BlogCategory::orderBy('blog_category','asc')->get();
@endphp
<h4 class="widget-title">Categories</h4>
<ul class="sidebar__cat">
    @foreach ($categories as $cat)
        <li class="sidebar__cat__item"><a href="{{ route('category.post',$cat->id) }}">{{ $cat->blog_category }}</a></li>
    @endforeach
</ul>