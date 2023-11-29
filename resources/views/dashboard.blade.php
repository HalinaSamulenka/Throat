<x-app-layout>
    <x-slot name="header">
        <h2 class="w-full font-semibold text-xl bg-gray-700 text-gray-200 leading-tight p-4 rounded-md mb-4">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-full flex flex-col flex-wrap md:flex-row gap-4 md:gap-8">

        <section class="p-4 bg-white dark:bg-gray-800 overflow-hidden
                  rounded-md text-gray-900 dark:text-gray-100 grow border-gray-200 shadow-sm">
            <header class="text-lg font-medium bg-gray-800 text-gray-200 p-4 rounded-t-md -m-4 mb-2 md:mb-4">
                <h4>Number of Words</h4>
            </header>
            <p>
                {{ $words  }}
            </p>
        </section>

        <section class="p-4 bg-white dark:bg-gray-800 overflow-hidden
                  rounded-md text-gray-900 dark:text-gray-100 grow border border-gray-200 md:border-0 shadow-sm
                 ">
            <header class="text-lg font-medium bg-gray-800 text-gray-200 p-4 rounded-t-md -m-4 mb-2">
                <h4>Number of Definition</h4>
            </header>
            <p>
                {{ $definitions }}
            </p>
        </section>





    </div>
</x-app-layout>

