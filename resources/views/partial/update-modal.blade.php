{{-- Update {{$tag_or_category}} --}}
<div x-data x-cloak x-show="$store.fire_model.show_model" class="relative z-10" role="dialog" aria-modal="true">

    <div class="fixed inset-0 hidden bg-gray-500 bg-opacity-75 transition-opacity md:block"></div>

    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-stretch justify-center text-center md:items-center md:px-2 lg:px-4">

            <div class="flex w-full transform text-left text-base transition md:my-8 md:max-w-2xl md:px-4">
                <div
                    class="relative flex w-full items-center overflow-hidden bg-white px-4 pt-14 pb-8 shadow-2xl sm:px-6 sm:pt-8 md:p-6 lg:p-8">
                    <button type="button" @click="$store.fire_model.show_model = false"
                        class="absolute top-4 right-4 text-gray-400 hover:text-gray-500 sm:top-8 sm:right-6 md:top-6 md:right-6 lg:top-8 lg:right-8">
                        <span class="sr-only">Close</span>
                        <!-- Heroicon name: outline/x-mark -->
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>




                    <div class="grid w-full grid-cols-1 items-start gap-y-8">
                        <div class="sm:col-span-8 lg:col-span-7">
                            <h2 class="text-2xl text-center font-bold text-gray-900 sm:pr-12 capitalize">
                                Update {{$tag_or_category}}
                            </h2>
                            <div class="modal-body relative p-4">

                                <form method="post" x-ref="update_form"
                                    x-bind:action="'{{url($tag_or_category)}}/'+$store.fire_model.id"
                                    class="mt-6 space-y-6" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <x-input-label for="name" class="sm:text-lg capitalize"
                                            :value="$tag_or_category.' Name'" />
                                        <x-text-input id="name" name="name" type="text"
                                            class="mt-1 block w-full max-w-xl text-gray-800"
                                            x-bind:value="$store.fire_model.name" />

                                    </div>

                                </form>
                            </div>
                            <div
                                class="modal-footer flex flex-shrink-0 flex-wrap items-center justify-end p-4 border-t border-gray-200 rounded-b-md">

                                <x-primary-button @click="$refs.update_form.submit()">
                                    {{ __('Update') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>