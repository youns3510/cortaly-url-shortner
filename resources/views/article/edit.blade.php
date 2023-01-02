@include('partial.editor')
<x-app-layout>
 <x-slot:title>
  Update Aritcle
 </x-slot:title>

 <x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
   {{ __('Update Aritcle') }}
  </h2>
 </x-slot>



 <div class="py-12">
  <div class="max-w-6xl mx-auto   sm:px-6 lg:px-8 space-y-6">
   <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
    @include('partial.status')

    <form method="post" action="{{ route('article.update',$article->id) }}" class="mt-6 space-y-6"
     enctype="multipart/form-data">
     @csrf
     @method('PUT')

     <div>
      <x-input-label for="title" :value="__('Title')" class="text-lg" />
      <x-text-input id="title" name="title" type="text" required :value="$article->title" class="mt-1 block w-full" />
     </div>
     <div>
      {{-- {{($category->id == $article->category_id )? 'selected': null}} --}}
      <x-input-label for="category" :value="__('Category')" class="text-lg" />
      <x-select id="category" name="category" required class="mt-1 block w-full">
       @foreach($categories as $category)
       <option value="{{$category->id}}" @selected($category->id == $article->category_id)>
        {{ $category->name }}
       </option>

       @endforeach
      </x-select>
     </div>

     <div>

      @php
      $article_tags_ids = $article->tags->pluck('id')->toArray();
      @endphp
      <x-input-label for="tags" :value="__('Tags')" class="text-lg" />
      <x-select id="tags" name="tags[]" required size="4" multiple class="form-multiselect block w-full mt-1">
       @foreach ($tags as $tag)
       <option value="{{$tag->id}}" @selected(in_array($tag->id,$article_tags_ids))>
        {{ $tag->name }}
       </option>
       @endforeach
      </x-select>
     </div>




     <x-input-label for="body" :value="__('Body')" class="text-lg" />
     <x-text-area id="editor" name="body" required rows="10" class="mt-1 block w-full">
      {{$article->body }}
     </x-text-area>

     <x-input-label for="thumbnail" :value="__('Thumbnail')" class="text-lg" />
     <div class="w-full grid grid-cols-1 md:grid-cols-5 gap-4 place-items-center">

      <x-file-input name="thumbnail" class="grid-col-1 w-full h-full place-items-center" />
      <img src="{{asset($article->thumbnail)}}" class="grid-col-1 md:grid-col-4 md:col-span-4  w-full h-full" alt="">

     </div>



     <x-primary-button class="text-lg">{{ __('Update') }}</x-primary-button>

    </form>






   </div>



  </div>
 </div>
</x-app-layout>