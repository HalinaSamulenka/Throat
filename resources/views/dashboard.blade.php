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
                <h4>Status</h4>
            </header>
            <p>
                {{ __("You're logged in!") }}
            </p>
        </section>

        <section class="p-4 bg-white dark:bg-gray-800 overflow-hidden
                  rounded-md text-gray-900 dark:text-gray-100 grow border border-gray-200 md:border-0 shadow-sm
                 ">
            <header class="text-lg font-medium bg-gray-800 text-gray-200 p-4 rounded-t-md -m-4 mb-2">
                <h4>Section Header</h4>
            </header>
            <p>
                {{ __("You're logged in!") }}
            </p>
        </section>

        <section class="p-4 bg-white dark:bg-gray-800 gap-4 flex flex-col
                  rounded-md text-gray-900 dark:text-gray-100 grow border-gray-200  shadow-sm">
            <header class="text-lg font-medium bg-gray-800 text-gray-200 p-4 rounded-t-md -m-4 mb-2">
                <h4>Section Header</h4>
            </header>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            <p>Accusantium dolores earum fuga ipsam labore nemo nobis nulla ratione tempore voluptatem. Blanditiis consequuntur
                eos iusto laudantium minus nam quasi voluptates! Ducimus.</p>
        </section>

    </div>
</x-app-layout>

