@php
$latestArticles =\App\Models\Article::select('id','title','thumbnail')
->with('tags:id,name')
->latest()
->limit(6)
->get();

$categories = \App\Models\Category::select('id','name')
->whereHas('articles')
->withCount('articles')
->orderByDesc('articles_count')
->limit(15)
->get();

$tags = \App\Models\Tag::select('id','name')
->whereHas('articles')
->withCount('articles')
->orderByDesc('articles_count')
->limit(15)
->get()

@endphp

@pushOnce('styles')
<style>
 .widget-post .widget-slider .item .content .meta-post a {
  color: #3b368c;
  font-size: 14px;
  margin-right: 5px;
  text-shadow: 0.624px 2.934px 2px rgba(232, 58, 153, 0.3);
 }

 .widget-post .widget-slider .item .content .meta-post a:hover,
 .widget-post .widget-slider .item .content .meta-post i {
  color: #ee4730;
  font-size: 14px;
  margin-right: 5px;
  text-shadow: 0.624px 2.934px 2px rgba(232, 58, 153, 0.3);
 }
</style>
@endpushOnce

<div class="col-lg-4 col-md-4 col-sm-10">
 <aside class="sticky-menu">
  <div class="widget widget-search">
   <h5 class="title">search</h5>
   <form class="search-form">
    <input type="text" placeholder="Enter your Search Content" required>
    <button type="submit"><i class="flaticon-loupe"></i>Search</button>
   </form>
  </div>
  <div class="widget widget-post">
   <h5 class="title">latest post</h5>
   <div class="slider-nav">
    <span class="widget-prev"><i class="fas fa-angle-left"></i></span>
    <span class="widget-next active"><i class="fas fa-angle-right"></i></span>
   </div>
   <div class="widget-slider owl-carousel owl-theme">

    @foreach ($latestArticles as $article)
    <div class="item">
     <div class="thumb">
      <a href="{{route('home.article.show',$article->id)}}">
       <img src="{{asset($article->thumbnail)}}" alt="blog">
      </a>
     </div>
     <div class="content">
      <h6 class="p-title">
       <a href="{{route('home.article.show',$article->id)}}">{{$article->title}}</a>
      </h6>

      <div class="meta-post">
       @foreach($article->tags as $tag)a
       <a href="{{route('home.tag.show',$tag->id)}}"> #{{$tag->name}}</a>
       @endforeach
      </div>

      {{-- <div class="meta-post">
       <span class="mr-4"><i class="flaticon-chat-1"></i>20 Comments</span>
       <span><i class="flaticon-eye"></i>466 View</span>
      </div> --}}

     </div>
    </div>
    @endforeach






   </div>
  </div>
  <div class="widget widget-follow">
   <h5 class="title">Follow Us</h5>
   <ul class="social-icons">
    <li>
     <a href="#" class="">
      <i class="fab fa-facebook-f"></i>
     </a>
    </li>
    <li>
     <a href="#" class="active">
      <i class="fab fa-twitter"></i>
     </a>
    </li>
    <li>
     <a href="#" class="">
      <i class="fab fa-pinterest-p"></i>
     </a>
    </li>
    <li>
     <a href="#">
      <i class="fab fa-google"></i>
     </a>
    </li>
    <li>
     <a href="#">
      <i class="fab fa-instagram"></i>
     </a>
    </li>
   </ul>
  </div>
  <div class="widget widget-categories">
   <h5 class="title">categories</h5>


   <ul>
    @foreach($categories as $category )
    <li>
     <a href="{{route('home.category.show',$category->id)}}">
      <span>{{$category->name}}</span>
      <span>{{$category->articles_count}}</span>
     </a>
    </li>
    @endforeach


   </ul>
  </div>
  <div class="widget widget-tags">
   <h5 class="title">featured tags</h5>
   <ul>
    @foreach($tags as $tag)
    <li> <a href="{{route('home.tag.show',$tag->id)}}">{{$tag->name}}</a></li>
    @endforeach
   </ul>
  </div>
 </aside>
</div>