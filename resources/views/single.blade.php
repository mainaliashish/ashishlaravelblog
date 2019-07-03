@extends('layouts.frontend')

@section('content')
<div class="content-wrapper">

<!-- Stunning Header -->

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">{{ $post-> title }}</h1>
    </div>
</div>

<!-- End Stunning Header -->

<!-- Post Details -->


<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            <div class="col-lg-10 col-lg-offset-1">
                <article class="hentry post post-standard-details">

                    <div class="post-thumb">
                        <img src="{{ asset($post->featured) }}" alt="{{ $post->title }}">
                    </div>

                    <div class="post__content">

                        <div class="post__content-info">

								{!! $post -> content !!}
                        <div class="socials">
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                        <br>
                            <div class="widget w-tags">
                                <div class="tags-wrap">
                                	@foreach($post->tags as $tag)
                                    <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}" class="w-tags-item">{{ $tag->tag }}</a>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </article>

                <div class="blog-details-author">

                    <div class="blog-details-author-thumb">
                        <img src="{{ asset($post->user->profile->avatar) }}" height="90" width="60" alt="Author">
                    </div>

                    <div class="blog-details-author-content">
                        <div class="author-info">
                            <h5 class="author-name">{{ $post->user->name }}</h5>
                            <p class="author-info">SEO Specialist</p>
                        </div>
                        <p class="text">{{ $post-> user -> profile -> about }}
                        </p>
                        <div class="socials text-center">
                            <div class="addthis_inline_share_toolbox"></div>
                        </div>
                    </div>
                </div>

                <div class="pagination-arrow">


                    @if($next)
                    <a href="{{ route('posts.single', ['slug' => $next -> slug]) }}" class="btn-next-wrap">
                        <div class="btn-content">
                            <div class="btn-content-title">Next Post</div>
                            <p class="btn-content-subtitle">{{
                                $next -> title }}</p>
                        </div>
                        <svg class="btn-next">
                            <use xlink:href="#arrow-right"></use>
                        </svg>
                    </a>
                    @endif

                    @if($previous)
                    <a href="{{ route('posts.single', ['slug' => $previous -> slug]) }}" class="btn-prev-wrap">
                        <svg class="btn-prev">
                            <use xlink:href="#arrow-left"></use>
                        </svg>
                        <div class="btn-content">
                            <div class="btn-content-title">Previous Post</div>
                            <p class="btn-content-subtitle">{{ $previous-> title }}</p>
                        </div>
                    </a>
                    @endif
                </div>

                <div class="comments">

                    <div class="heading text-center">
                        <h4 class="h1 heading-title">Comments</h4>
                        <div class="heading-line">
                            <span class="short-line"></span>
                            <span class="long-line"></span>
                        </div>
                    </div>
                    @include('includes.disqus')
                </div>

                <div class="row">

                </div>


            </div>

            <!-- End Post Details -->

            <!-- Sidebar-->

            <div class="col-lg-12">
                <aside aria-label="sidebar" class="sidebar sidebar-right">
                    <div  class="widget w-tags">
                        <div class="heading text-center">
                            <h4 class="heading-title">ALL BLOG TAGS</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>

                        <div class="tags-wrap">

                            @foreach($tags as $tag)
                            <a href="{{ route('tags.single', ['slug' => $tag->slug]) }}" class="w-tags-item">{{ $tag -> tag }}</a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            <!-- End Sidebar-->

        </main>
    </div>
</div>


</div>

@endsection

