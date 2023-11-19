<x-app-layout>

    <section class="w-full p-6 flex flex-col gap-4">
        <h3 class="text-lg text-gray-800 dark:text-gray-200
                   font-bold">
            Word Details
        </h3>

        <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
            <p class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                Word
            </p>
            <p class="p-2 w-5/6">{{ $word->word }}</p>
        </div>

        @foreach($word->definitions as $word)
        <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">

            <p class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                Definition {{ $loop->index + 1 }}
            </p>
            <ul class="p-2 text-left">

                <li>
                {{ \Illuminate\Support\Str::words($word->definition,15) }}

            </li>
                </ul>
        </div>
        @endforeach

        <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
            <p class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                Review
            </p>
        @if ($word->review==true)
                <p class="p-2 w-5/6">Review</p>
        @else
            <p class="p-2 w-5/6">No</p>
            @endforelse
        </div>

        <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
            <p class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                Status
            </p>
            @if ($word->appropriate==true)
                <p class="p-2 w-5/6">Not Appropriate</p>
            @else
                <p class="p-2 w-5/6">Appropriate</p>
                @endforelse
        </div>

        <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
            <p class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                Created At
            </p>
            <p class="p-2 w-5/6">{{ $word->created_at }} </p>
        </div>

        <div class="flex flex-row gap-4 rounded-md
                    bg-gray-200 dark:bg-gray-900">
            <p class="p-2 w-1/6 rounded-l-md
                      bg-gray-500 dark:bg-gray-800
                      text-gray-100">
                Updated At
            </p>
            <p class="p-2 w-5/6">{{ $word->updated_at }} </p>
        </div>

        <p class="flex flex-row md:w-13 w-full rounded-md">

            <a href="{{ route('words.index') }}"
               class="text-center p-2 grow rounded-l-md
                          text-white
                          bg-sky-500 hover:bg-sky-900
                          dark:bg-sky-800 dark:hover:bg-sky-500
                          transition ease-in-out duration-350">
                <i class="fa fa-arrow-rotate-back"></i>
                <span class="sr-only">Back</span>
            </a>

            <a href="{{ route('words.edit',$word->id) }}"
               class="text-center p-2 grow
                          text-white
                          bg-orange-500 hover:bg-orange-900
                          dark:bg-orange-800 dark:hover:bg-orange-500
                          transition ease-in-out duration-350">
                <i class="fa fa-edit"></i>
                <span class="sr-only">Edit</span>
            </a>

            <a href="{{ route('words.delete',$word->id) }}"
               class="text-center p-2 grow rounded-r-md
                          text-white
                          bg-red-500 hover:bg-red-900
                          dark:bg-red-800 dark:hover:bg-red-500
                          transition ease-in-out duration-350">
                <i class="fa fa-times"></i>
                <span class="sr-only">Delete</span>
            </a>

        </p>
    </section>

</x-app-layout>
