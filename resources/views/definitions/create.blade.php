<x-app-layout>

        @if($errors->any())
            <div class="flex flex-col gap-4 bg-red-200 text-red-800 my-4 rounded-lg">
                @foreach($errors->all() as $error)
                    <p class="p-4">{{ $error }}</p>
                @endforeach
            </div>
        @endif
            <section class="w-full p-6 flex flex-col gap-4">
                <h3 class="text-lg text-gray-800 dark:text-gray-200
                   font-bold">
                    {{ __('Add Definition') }}
                </h3>

        <form
            method="POST"
            action="{{ route('definitions.store') }}"
            class="flex flex-col w-full gap-4">

            @csrf
            @method('POST')

            <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
                <label for="Word"
                       class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __('Word') }}
                </label>
                <select
                    id="word_id"
                    name="word_id"
                    class="p-2 w-5/6 bg-gray-200 dark:bg-gray-900 rounded-r-md">

                    @foreach($words as $word)
                    <option value="{{$word->id}}">{{$word->word}}</option>
                    @endforeach
                        <option value=" "  @if(old('word')?old('word')=='':false) selected @endif disabled>Select a word
                        </option>
                </select>
            </div>

            <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
                <label for="Word"
                       class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __('Word Types') }}
                </label>
                <select
                    id="word_type_id"
                    name="word_type_id"
                    class="p-2 w-5/6 bg-gray-200 dark:bg-gray-900 rounded-r-md">

                    @foreach($wordTypes as $wordType)
                        <option value="{{$wordType->id}}">{{$wordType->name}}</option>
                    @endforeach
                    <option value=" "  @if(old('word_type')?old('word_type')=='':false) selected @endif disabled>Select a word
                    </option>
                </select>
            </div>

            <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">

                <label
                    for="Definition"
                    class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __("Definition") }}
                </label>
                <input
                    id="definition"
                    name="definition"
                    type="text"
                    class="p-2 w-5/6 bg-gray-200 dark:bg-gray-900 rounded-r-md"
                    value="{{ old('definition') }}"/>

           </div>

            <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
                <label for="Rating"
                       class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __('Rating') }}
                </label>
                <select
                    id="rating_id"
                    name="rating_id"
                    class="p-2 w-5/6 bg-gray-200 dark:bg-gray-900 rounded-r-md">

                    @foreach($ratings as $rating)
                        <option value="{{$rating->id}}">{{$rating->name}}</option>
                    @endforeach
                    <option value=" "  @if(old('rating')?old('rating')=='':false) selected @endif disabled>Select a rating
                    </option>
                </select>
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
                <input  class="form-check-input p-5 w-1/8 bg-gray-200" id="review" value="review" type="checkbox" name="review" ></input>

            </div>




            <div class="flex flex-row rounded-md">

                <a href="{{ route('definitions.index') }}"
                   class="text-center p-2 grow rounded-l-md
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
                       text-white rounded-r-md
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
