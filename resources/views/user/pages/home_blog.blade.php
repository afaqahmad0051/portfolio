@extends('user.main_master')
@section('user')
@section('title')
    Blog | Afaq Ahmad
@endsection
<!-- breadcrumb-area -->
<section class="breadcrumb__wrap">
    <div class="container custom-container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-8 col-md-10">
                <div class="breadcrumb__wrap__content">
                    <h2 class="title">All Blogs</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcrumb__wrap__icon">
        <ul>
            <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon01.png')}}" alt=""></li>
            <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon02.png')}}" alt=""></li>
            <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon03.png')}}" alt=""></li>
            <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon04.png')}}" alt=""></li>
            <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon05.png')}}" alt=""></li>
            <li><img src="{{asset('frontend/assets/img/icons/breadcrumb_icon06.png')}}" alt=""></li>
        </ul>
    </div>
</section>
<!-- breadcrumb-area-end -->
<!-- blog-area -->
<section class="standard__blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($blogs as $item)                    
                    <div class="standard__blog__post">
                        <div class="standard__blog__thumb">
                            <a href="{{route('blog.details',$item->id)}}"><img src="{{ asset($item->blog_image) }}" alt=""></a>
                            <a href="{{route('blog.details',$item->id)}}" class="blog__link"><i class="far fa-long-arrow-right"></i></a>
                        </div>
                        <div class="standard__blog__content">
                            <div class="blog__post__avatar">
                                <div class="thumb"><img src="{{ (!empty($user->profile_image))? url('upload/admin_images/'.$user->profile_image):url('upload/blank.jpg') }}" alt=""></div>
                                <span class="post__by"> By : <a href="#">{{$user->name}}</a></span>
                            </div>
                            <h2 class="title"><a href="{{route('blog.details',$item->id)}}">{{ $item->blog_title }}</a></h2>
                            <p>{!! Str::of($item->blog_description)->words(25, ' ...') !!}</p>
                            <ul class="blog__post__meta">
                                <li style="color: white;"><i class="fal fa-calendar-alt"></i>{{date('d-m-Y', strtotime(trim(str_replace('/','-',$item->created_at))))}} - {{date('h:i:s A', strtotime(trim(str_replace('/','-',$item->created_at))))}}</li>
                                <li><i class="fal fa-comments-alt"></i> <a href="#">Comment (08)</a></li>
                                {{-- <li class="post-share"><a href="#"><i class="fal fa-share-all"></i> (18)</a></li> --}}
                            </ul>
                        </div>
                    </div>
                @endforeach
                
                <div class="pagination-wrap">
                    {{ $blogs->links('vendor.pagination.custom') }}
                </div>
            </div>
            <div class="col-lg-4">
                <aside class="blog__sidebar">
                    <div class="widget">
                        <form action="#" class="search-form">
                            <input type="text" placeholder="Search">
                            <button type="submit"><i class="fal fa-search"></i></button>
                        </form>
                    </div>
                    <div class="widget">
                        @include('user.layouts.recent_blog')
                    </div>
                    <div class="widget">
                        @include('user.layouts.blog_categories')
                    </div>
                    <div class="widget">
                        <h4 class="widget-title">Popular Tags</h4>
                        <ul class="sidebar__tags">
                            <li><a href="blog.html">Business</a></li>
                            <li><a href="blog.html">Design</a></li>
                            <li><a href="blog.html">apps</a></li>
                            <li><a href="blog.html">landing page</a></li>
                            <li><a href="blog.html">data</a></li>
                            <li><a href="blog.html">website</a></li>
                            <li><a href="blog.html">book</a></li>
                            <li><a href="blog.html">Design</a></li>
                            <li><a href="blog.html">product design</a></li>
                            <li><a href="blog.html">landing page</a></li>
                            <li><a href="blog.html">data</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
<!-- blog-area-end -->
<!-- contact-area -->
<section class="homeContact homeContact__style__two">
    @include('user.layouts.contact')
</section>
<!-- contact-area-end -->

@endsection