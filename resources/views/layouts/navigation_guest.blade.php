<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ URL::to('/')}}/images/icons/uvula.png" alt="" class="h-8 inline-flex">
                    {{ __('THROAT') }}
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <!--<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"
                                class="text-stone-600">
                        {{ __('Dashboard') }}
                    </x-nav-link>-->
                    <x-nav-link :href="route('ratings.index')" :active="request()->routeIs('rating')"
                                class="text-stone-600">
                        {{ __('Rating') }}
                    </x-nav-link>
                    <x-nav-link :href="route('wordtypes.index')" :active="request()->routeIs('wordtypes')"
                                class="text-stone-600">
                        {{ __('Word Type') }}
                    </x-nav-link>
                    <x-nav-link :href="route('words.index')" :active="request()->routeIs('word')"
                                class="text-stone-600">
                        {{ __('Word') }}
                    </x-nav-link>
                    <x-nav-link :href="route('definitions.index')" :active="request()->routeIs('definition')"
                                class="text-stone-600">
                        {{ __('Definition') }}
                    </x-nav-link>
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('user')"
                                class="text-stone-600">
                        {{ __('User') }}
                    </x-nav-link>
                </div>
            </div>

        <!-- Navigation Links
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                <x-nav-link :href="route('ratings.index')" :active="request()->routeIs('rating')">
                    {{ __('Rating') }}
            </x-nav-link>
        </div>
    </div>-->




            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex items-center
                            text-sm font-medium text-indigo-700
                            @if(auth()) hover:text-neutral-200 @else hover:text-gray-500 @endif
                                hover:border-neutral-100
                                focus:outline-none focus:text-neutral-100 focus:border-neutral-300
                                transition duration-150 ease-in-out">
                            @auth()
                                <div>{{ Auth::user()->name }}</div>
                            @else
                            <div class="ml-1>">{{ __('Profile') }}</div>

                            @endauth
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <p>
                            <!-- Authentication -->

                            @auth()
                                <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                             onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                            @else
                                <a href="{{ route('login') }}"
                                   class="ml-4 text-sm text-stone-700 dark:text-stone-500 ">
                                    {{ __("Log-in") }}
                                </a>
                            @if (Route::has('register'))
                            <p>
                                <a href="{{ route('register') }}"
                                   class="ml-4 text-sm text-stone-700 dark:text-stone-500 ">
                                    {{ __("Register") }}
                                </a>
                            </p>
                            @endif
                            @endauth
                        </p>


                    </x-slot>
                </x-dropdown>
            </div>



            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('ratings.index')" :active="request()->routeIs('ratings')">
                {{ __('Rating') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->

        </div>
    </div>
</nav>
