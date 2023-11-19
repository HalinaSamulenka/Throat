<x-app-layout>
    <div class="flex flex-col gap-4">
        <h1 class="text-teal-700 text-2xl">
            Welcome to {{ env('APP_NAME') }} - Contact Us
        </h1>

        <p class="text-green-500">
            Contact page here
        </p>

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
                   href="{{route('static.terms')}}">
                    Terms and conditions</a>
            </li>
        </ul>
    </div>
</x-app-layout>
