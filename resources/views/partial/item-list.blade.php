<x-item-link x-cloak :name="$$tag_or_category->name" :count="$$tag_or_category->articles_count">
 <div x-show.transition.origin.top="tooltip_{{$$tag_or_category->id}}">
  <div class="flex items-center justify-center mb-3 absolute
                                 right-5 -top-10 z-10 leading-tight
                                 text-white
                                 transform translate-x-6 -translate-y-full rounded-lg shadow-lg">
   <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">


    <x-link :href="route($tag_or_category.'.show',$$tag_or_category->id)" 
      title="View" class="rounded-l w-8  bg-green-500 hover:bg-green-600 focus:bg-green-600  active:bg-green-700 ">
     <svg class=" w-full  stroke-1 md:stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round"
       d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
      <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
     </svg>
    </x-link>

    <x-link title="Edit" class="w-8  bg-yellow-500 hover:bg-yellow-600 focus:bg-yellow-600  active:bg-yellow-700 "
     @click.prevent="$store.fire_model.updateItem('{{$$tag_or_category->id}}','{{$$tag_or_category->name}}')"     >

     <svg class="w-full stroke-1 md:stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round"
       d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.   75V8.25A2.25 2.25 0 015.25 6H10" />
     </svg>

    </x-link>

    <x-link title="Delete" class="rounded-r w-8 h-full  bg-red-500 hover:bg-red-600 focus:bg-red-600  active:bg-red-700 "
     @click.prevent="$refs.delete_form_{{$$tag_or_category->id}}.submit()">

     <svg class=" w-full stroke-1 md:stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
      stroke-width="1.5" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round"
       d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
     </svg>


     <form method="POST" x-ref="delete_form_{{$$tag_or_category->id}}" action="{{route($tag_or_category.'.destroy',$$tag_or_category->id)}}">
      @method("DELETE")
      @csrf
     </form>
    </x-link>
   </div>
  </div>
 </div>
</x-item-link>