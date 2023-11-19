<x-app-layout>


    <section class="w-full p-6 flex flex-col gap-4">
        <h3 class="text-lg text-gray-800 dark:text-gray-200
                   font-bold">
            {{ __('Edit Word') }}
        </h3>

        @if($errors->any())
            <div class="flex flex-col gap-4 bg-red-200 text-red-800 my-4 rounded-lg">
                @foreach($errors->all() as $error)
                    <p class="p-4">{{ $error }}</p>
                @endforeach
            </div>
        @endif


        <form
            method="POST"
            action="{{ route('words.update', ['word'=>$word]) }}"
            class="flex flex-col w-full gap-4">

            @csrf
            @method('PATCH')

            <div class="flex flex-row">

                <label
                    for="Word"
                    class="p-2 w-1/6 rounded-l-lg
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __("Word") }}
                </label>
                <input
                    id="Word"
                    name="word"
                    type="text"
                    class="p-2 w-5/6 border-gray-500 rounded-r-lg"
                    value="{{ old('word') ?? $word->word }}"/>
            </div>

            <div class="flex gap-4 rounded-md
                     dark:bg-gray-1000">

                <label
                    for="Review"
                    class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __("Review") }}
                </label>
                <input  class="form-check-input p-5 w-1/8 bg-gray-200"
                        id="review" value="on"
                        type="checkbox" name="review" @if ($word->review==1) checked @endif></input>

            </div>

            @if(Auth::user()->id == 1)
                <div class="flex gap-4 rounded-md
                     dark:bg-gray-1000">

                    <label
                        for="Appropriate"
                        class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                        {{ __("Not Appropriate") }}
                    </label>
                    <input  class="form-check-input p-5 w-1/8 bg-gray-200"
                            id="appropriate" value="appropriate" type="checkbox" name="appropriate"
                            @if ($word->appropriate==1) checked @endif></input>

                </div>
            @endif

            <div class="grid grid-cols-6 gap-4">
                <div></div>
                <a href="{{ route('words.index') }}"
                   class="text-center p-2 grow rounded-lg
                          text-white
                          bg-sky-500 hover:bg-sky-900
                          dark:bg-sky-800 dark:hover:bg-sky-500
                          transition ease-in-out duration-350">
                    <i class="fa fa-arrow-rotate-back"></i>
                    <span class="sr-only">Back</span>
                </a>

                <button
                    type="submit"
                    class="text-center p-2 grow
                       text-white rounded-lg
                       bg-orange-500 hover:bg-orange-900
                       dark:bg-orange-800 dark:hover:bg-orange-500
                       transition ease-in-out duration-350">
                    <i class="fa fa-save"></i>
                    <span class="sr-only">Save</span>
                </button>

            </div>

        </form>

    </section>

</x-app-layout>
