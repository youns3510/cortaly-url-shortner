@extends('layouts.front')
@section('title', $article->title)

@section('content')

<!--============= Blog Section Starts Here =============-->
<section class="blog-single mt--150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-70 mb-lg-0">
                <article>
                    <div class="post-details">
                        <div class="post-inner">
                            <div class="post-header">
                                <div class="meta-post">
                                    <span class="read">{{$article->created_at->diffForHumans() }}</span>
                                    <span class="read">{{readDuration($article->body)}} min read</span>
                                </div>
                                <h3 class="title">
                                    {{ $article->title }}
                                </h3>
                            </div>

                            <div class="post-content">
                                <div class="entry-meta">
                                    <div class="thumb">
                                        <a href="#">
                                            <img src="{{ asset('images/blog/author.png') }}" alt="blog">
                                        </a>
                                    </div>
                                    <a href="#" class="comment">
                                        <i class="flaticon-chat-1"></i>
                                        <span>30</span>
                                    </a>
                                    <a href="#" class="comment">
                                        <i class="flaticon-share"></i>
                                        <span>22</span>
                                    </a>
                                </div>
                                <div class="entry-content">
                                    <div class="post-thumb">
                                        <img src="{{asset($article->thumbnail)}}" alt="{{$article->title}}">
                                    </div>
                                    {!! $article->body !!}
                                </div>
                            </div>
                        </div>
                        <div class="tags-area">
                            <div class="tags">
                                <span>
                                    Tags :
                                </span>
                                <div class="tags-item">
                                    @forelse ($article->tags as $tag)
                                    <a href="{{ route('home.tag.show', $tag->id) }}"> {{ $tag->name }} </a>
                                    @empty
                                    <a href="#">#</a>
                                    @endforelse
                                </div>
                            </div>
                            <ul class="social-icons">
                                <li>
                                    <a href="#">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="active">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-pinterest"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fab fa-google"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                  {{-- Comment Sections --}}

                </article>
            </div>
           @include('partial.sidebar')
        </div>
    </div>
</section>
<!--============= Blog Section Ends Here =============-->

@endsection