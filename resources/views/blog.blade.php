@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        @if($first_post)
                        <div class="post-thumb">
                            <img src="{{ $first_post -> featured ? $first_post -> featured : 'https://via.placeholder.com/800' }}" alt="{{ isset($first_post -> title) ? $first_post -> title : '' }}">
                            <div class="overlay"></div>
                            <a href="{{ $first_post -> featured ? $first_post -> featured : 'https://via.placeholder.com/800' }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>


                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        @if(isset($first_post->slug))
                                        <a href="{{ route('posts.single', ['slug' => $first_post->slug]) }}">{{ isset($first_post -> title) ? $first_post -> title : '' }}</a>
                                        @endif
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{ isset($first_post -> created_at) ? $first_post -> created_at->toFormattedDateString() : '' }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{ isset($first_post->category->name) ? $first_post->category->name : '' }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                        @endif

                </article>
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        @if($second_post)
                        <div class="post-thumb">
                            <img src="{{ $second_post -> featured ? $second_post -> featured : 'https://via.placeholder.com/800' }}" alt="{{ $second_post -> title ? $second_post -> title : '' }}">
                            <div class="overlay"></div>
                            <a href="{{ $second_post -> featured ? $second_post -> featured : '' }}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>


                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        @if($second_post->slug)
                                        <a href="{{ route('posts.single', ['slug' => $second_post->slug]) }}">{{ $second_post -> title }}</a>
                                        @endif
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                               {{ $second_post -> created_at ? $second_post -> created_at ->toFormattedDateString() : '' }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{ $second_post ->category ? $second_post ->category -> name : '' }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                        @endif

                </article>
            </div>
            <div class="col-lg-6">
                <article class="hentry post post-standard has-post-thumbnail sticky">

                        @if($third_post)
                        <div class="post-thumb">
                            <img src="{{ $third_post -> featured ? $third_post -> featured : ''}}" alt="{{ $third_post -> title ? $third_post -> title : '' }}">
                            <div class="overlay"></div>
                            <a href="{{ $third_post -> featured ? $third_post -> featured : ''}}" class="link-image js-zoom-image">
                                <i class="seoicon-zoom"></i>
                            </a>
                            <a href="#" class="link-post">
                                <i class="seoicon-link-bold"></i>
                            </a>
                        </div>

                        <div class="post__content">

                            <div class="post__content-info">

                                    <h2 class="post__title entry-title ">
                                        @if($third_post->slug)
                                        <a href="{{ route('posts.single', ['slug' => $third_post->slug]) }}">{{ $third_post -> title }}</a>
                                        @endif
                                    </h2>

                                    <div class="post-additional-info">

                                        <span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                              {{ $third_post -> created_at ? $third_post -> created_at -> toFormattedDateString() : '' }}
                                            </time>

                                        </span>

                                        <span class="category">
                                            <i class="seoicon-tags"></i>
                                            <a href="#">{{ $third_post -> category ? $third_post -> category->name : '' }}</a>
                                        </span>

                                        <span class="post__comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i></a>
                                            6
                                        </span>

                                    </div>
                            </div>
                        </div>
                        @endif

                </article>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row medium-padding120 bg-border-color">
            <div class="container">
                <div class="col-lg-12">
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $rails->name ? $rails->name : '' }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @if($rails -> posts())
                            @foreach ($rails -> posts() -> take(3) ->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured ? $post->featured : '' }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('posts.single', ['slug' => $post->slug]) }}">{{
                                   $post->title }}</a></h6>
                                </div>
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
                <div class="offers">
                    <div class="row">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="heading">
                                <h4 class="h1 heading-title">{{ $web-> name ? $web-> name : '' }}</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="case-item-wrap">
                            @if($web->posts())
                            @foreach($web->posts()->take(3)->get() as $post)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{ $post->featured ? $post->featured : '' }}" alt="our case">
                                    </div>
                                    <h6 class="case-item__title"><a href="{{ route('posts.single', ['slug' => $post->slug]) }}">{{
                                        $post->title
                                    }}</a></h6>
                                </div>
                            </div>
                            @endforeach
                            @endif


                        </div>
                    </div>
                </div>
                <div class="padded-50"></div>
            </div>
            </div>
        </div>
    </div>

@endsection

