<x-app-layout>

    <section class="w-full p-6 flex flex-col gap-4">
        <h3 class="text-lg text-gray-800 dark:text-gray-200
                   font-bold">
            {{ __('Edit Rating') }}
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
            action="{{ route('ratings.update', ['rating'=>$rating]) }}"
            class="flex flex-col w-full gap-4">

            @csrf
            @method('PATCH')

            <div class="flex flex-row">

                <label
                    for="Name"
                    class="p-2 w-1/6 rounded-l-lg
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __("Name") }}
                </label>
                <input
                    id="Name"
                    name="name"
                    type="text"
                    class="p-2 w-5/6 border-gray-500 rounded-r-lg"
                    value="{{ old('name') ?? $rating->name }}"/>
            </div>

            <div class="flex flex-row rounded-lg">

                <label for="Icon"
                       class="p-2 w-1/6 rounded-l-lg
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{ __('Icon') }}
                </label>
                <select
                    id="Icon"
                    name="icon"
                    class="form-select p-2 w-5/6  border-gray-500 rounded-r-lg">
                    <option value="lemon" @if(old('icon')??$rating->icon=='lemon') selected @endif>Lemon</option>
                    <option value="star" @if(old('icon')??$rating->icon=='star') selected @endif>Star</option>
                    <option value="splotch" @if(old('icon')??$rating->icon=='splotch') selected @endif>Splotch</option>
                    <option value="poo" @if(old('icon')??$rating->icon=='poo') selected @endif>Poo</option>
                    <option value="cloud" @if(old('icon')??$rating->icon=='cloud') selected @endif>Cloud</option>
                    <option value="ghost" @if(old('icon')??$rating->icon=='ghost') selected @endif>Ghost</option>
                    <option value="thumbs-up" @if(old('icon')??$rating->icon=='thumbs-up') selected @endif>Thumbs Up
                    </option>
                    <option value="thumbs-down" @if(old('icon')??$rating->icon=='thumbs-down') selected @endif>Thumbs
                        Down
                    </option>
                    <option value="" @if(old('icon')??$rating->icon=='') selected @endif disabled>Select an icon
                    </option>
                </select>
            </div>

            <div class="flex flex-row  rounded-lg">
                <label
                    for=Stars"
                    class="p-2 w-1/6 rounded-l-lg
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                    {{__('Stars')}}
                </label>
                <input type="range"
                       id="Stars"
                       name="stars"
                       class="ml-2 p-2 w-5/6  rounded-r-lg "
                       min="0" max="10" value="{{ old('stars') ?? $rating->stars }}">
            </div>

            <div class="grid grid-cols-6 gap-4">
                <div></div>
                <a href="{{ route('ratings.index') }}"
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
