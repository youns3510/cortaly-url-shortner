@extends('layouts.front')
@section('title', $title ?? 'Blog')
@pushOnce('styles')
<style>
    .pagination-area .pagination {
        justify-content: center !important;
    }

    .pagination-area .pagination .page-link {
        width: 42px !important;
        height: 42px !important;
        color: #7a89bb;
        margin: 0 15px !important;
        border: none !important;
        border-radius: 50% !important;
        ;
    }

    .pagination-area .pagination .page-item.active .page-link {
        background: -moz-linear-gradient(-30deg, #c165dd 0%, #5c27fe 100%);
        background: -webkit-linear-gradient(-30deg, #c165dd 0%, #5c27fe 100%);
        background: -ms-linear-gradient(-30deg, #c165dd 0%, #5c27fe 100%);
        box-shadow: 0px 3px 7px 0px rgba(0, 0, 0, 0.35);
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        color: #ffffff;
    }
</style>
@endpushOnce
@section('content')
<!--============= Blog Section Starts Here =============-->
<section class="blog-section mt--150">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-8">
                <article class="mb-40-none">

                    @forelse ($articles as $article)
                    <div class="post-item style-two">
                        <div class="post-thumb">
                            <a href="{{route('home.article.show',$article->id)}}"><img
                                    src="{{asset($article->thumbnail)}}" alt="{{$article->title}}"></a>
                        </div>
                        <div class="post-content">
                            <h3 class="title">
                                <a href="{{route('home.article.show',$article->id)}}">{{$article->title}} </a>
                            </h3>
                            <p>{!! Str::words(strip_tags($article->body), 15, '...') !!}</p>
                            <a href="{{route('home.article.show',$article->id)}}" class="read">
                                {{readDuration($article->body)}} min Read
                            </a>
                        </div>
                    </div>
                    @empty
                    <div class="post-item style-two">
                        <div class="post-content text-center">
                            <h3 class="title">No Articles Here</h3>
                        </div>
                    </div>

                    @endforelse




                </article>
                @unless ($articles->isEmpty()) {{-- == if not empty--}}
                <div class="pagination-area text-center pt-50 pb-50 pb-lg-0">
                    {{$articles->links()}}
                </div>
                @endunless





            </div>
            @include('partial.sidebar')
        </div>
    </div>
</section>
<!--============= Blog Section Ends Here =============-->
@endsection