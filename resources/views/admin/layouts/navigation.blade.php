<nav class="bg-white border-b border-gray-200 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex justify-between items-center h-16">
        <!-- Left Side: Hamburger -->
        <div class="flex items-center space-x-4">
            <!-- Hamburger Button -->
            <button class="text-gray-500 hover:text-gray-700 focus:outline-none mr-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Search Input (takes all space between left and right) -->
        <div class="flex-1 mx-4 relative">
            <input
                type="text"
                placeholder="Search..."
                class="w-full pl-3 pr-10 py-2 text-sm border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            />
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-4.35-4.35M16.65 17.65A7 7 0 1117.65 16.65z"/>
                </svg>
            </div>
        </div>

        <!-- Right Side: User Avatar + Name -->
        <div class="flex items-right space-x-2">
            <!-- Avatar Circle -->
            <img src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim(Auth::guard('admin')->user()->email))) }}?s=32&d=identicon"
                 alt="Avatar"
                 class="w-8 h-8 rounded-full"/>

            <!-- User Name -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::guard('admin')->user()->name }}</div>

                            <div class="ml-1">
                                <!--<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>-->
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('admin.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>



