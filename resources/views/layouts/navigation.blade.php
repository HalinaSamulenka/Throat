<nav x-data="{ open: false }">

    <!-- Settings Dropdown -->
    <div class="hidden sm:flex flex-row gap-4 items-center sm:ml-6">

        @auth()
            @if(Auth::user()->hasRole('admin'))
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>@else

            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
            @endif

            <x-nav-link :href="route('words.index')" :active="request()->routeIs('word')">
                {{ __('Words') }}
            </x-nav-link>
            <x-nav-link :href="route('definitions.index')" :active="request()->routeIs('definition')">
                {{ __('Definitions') }}
            </x-nav-link>
            <x-nav-link :href="route('wordtypes.index')" :active="request()->routeIs('wordtypes')">
                {{ __('Word Types') }}
            </x-nav-link>
            <x-nav-link :href="route('ratings.index')" :active="request()->routeIs('rating')">
                {{ __('Ratings') }}
            </x-nav-link>
            <x-nav-link :href="route('users.index')" :active="request()->routeIs('user')">
                {{ __('Users') }}
            </x-nav-link>
            <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles')">
                {{ __('Roles') }}
            </x-nav-link>
            <div class="grow"></div>
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-1 my-1 border border-transparent text-sm leading-4 font-medium
                        rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
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
                </x-slot>
            </x-dropdown>
        @else

            @if (Route::has('login'))
                <div class="sm:top-0 sm:right-0 p-2 text-right z-10 flex flex-col md:flex-row">
                    <a href="{{ route('login') }}"
                       class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                </div>
            @endif
        @endauth
    </div>

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                      stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>


    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('words.index')" :active="request()->routeIs('word')">
                {{ __('Words') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('definitions.index')" :active="request()->routeIs('definition')">
                {{ __('Definitions') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('wordtypes.index')" :active="request()->routeIs('wordtypes')">
                {{ __('Word Types') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('ratings.index')" :active="request()->routeIs('rating')">
                {{ __('Ratings') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            @auth
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            @else
                @if (Route::has('login'))
                    <div class="sm:top-0 sm:right-0 ml-4 p-2 z-10 flex flex-col md:flex-row gap-2 md:gap-4">
                        <a href="{{ route('login') }}"
                           class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white
                                  focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                            Log-in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                               class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white
                                      focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                Register
                            </a>
                        @endif
                    </div>
                @endif
            @endauth
        </div>
    </div>
</nav>

