<x-app-layout>

    <h1 class="text-teal-700 text-2xl">
        Welcome to {{ env('APP_NAME') }}
    </h1>


    <ul class="flex flex-row gap-4 mt-6">
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.home')}}">
                Home
            </a></li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.privacy')}}">
                Privacy</a>
        </li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.contact')}}">
                Contact Us
            </a></li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.terms')}}">
                Terms and conditions</a>
        </li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.colours')}}">
                Colours</a>
        </li>
        <li><a class="bg-stone-300 rounded-full p-2"
               href="{{route('static.icons')}}">
                Icons</a>
        </li>
    </ul>
</x-app-layout>
