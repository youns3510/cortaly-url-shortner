<x-app-layout>
 <x-slot:title> {{-- window title --}}
  {{ $title ?? 'All Articles' }}
  </x-slot>
  <x-slot name="header">
   <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    {{ $title ?? 'All Articles' }}
   </h2>
  </x-slot>

  <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
     <div class="flex flex-col">
      <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
       <div class="py-4 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
         @include('partial.status')
         @unless($articles->isEmpty())
         <table class="min-w-full text-center">
          <thead class="border-b bg-gray-800">
           <tr>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
             #
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
             Thumbnail
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
             Title
            </th>
            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
             Category
            </th>

            <th scope="col" class="text-sm font-medium text-white px-6 py-4">
             Action
            </th>
           </tr>
          </thead class="border-b">
          <tbody>


           @foreach ($articles as $article)

           <tr class="bg-white border-b">
            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
             {{ $loop->iteration }}</td>
            <td class="px-6 py-4 whitespace-nowrap">
             <img class="w-40" src="{{ asset($article->thumbnail) }}" alt="">
            </td>

            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
             {{ $article->title }}
            </td>
            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
             {{ $article->category->name }}
            </td>

            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">

             <div class="flex items-center justify-center mb-3">
              <div class="inline-flex shadow-md hover:shadow-lg focus:shadow-lg" role="group">

               <x-link title="Show" :href="route('home.article.show', $article->id)"
                class="rounded-l w-10  bg-green-500 hover:bg-green-600  focus:bg-green-600   active:bg-green-700 ">
                <svg class=" w-full  stroke-1 md:stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round"
                  d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                 <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

               </x-link>

               <x-link title="Edit" :href="route('article.edit', $article->id)"
                class="w-10 bg-yellow-500 hover:bg-yellow-600  active:bg-yellow-700  focus:bg-yellow-600 ">
                <svg class="w-full stroke-1 md:stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round"
                  d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.   75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>

               </x-link>



               <x-link x-data="{}" @click.prevent="$refs.destroy_article.submit()" title="Delete"
                class="rounded-r w-10 bg-red-500 hover:bg-red-600 focus:bg-red-600  active:bg-red-700 ">

                <svg class=" w-full stroke-1 md:stroke-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                 <path stroke-linecap="round" stroke-linejoin="round"
                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>

                <form x-ref="destroy_article" action="{{route('article.destroy', $article->id)}}" method="POST">
                 @csrf
                 @method('DELETE')
                </form>
               </x-link>



              </div>
             </div>







            </td>

           </tr>
           @endforeach




          </tbody>
         </table>
         <div class="mt-5">
          {{ $articles->links() }}
         </div>
         @else
         <h3 class="text-center font-bold ">No Articles Here</h3>
         @endunless
        </div>
       </div>
      </div>
     </div>
    </div>




   </div>
  </div>
</x-app-layout>