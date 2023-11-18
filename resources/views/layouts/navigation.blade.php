<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 
 <style>
        /* Remove underline from links in the navigation menu */
        nav a {
            text-decoration: none;
        }
    </style>

<nav x-data="{ open: false }" class="bg-dark dark:bg-gray-800 fixed-top  ">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="tshrink-0 flex items-center pt-2">
                    <a href="{{ route('admin.index') }}">
                      <h4 class="text-danger"> Fitpoint</h4>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex ">
                    <x-nav-link class="text-white" :href="route('admin.dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    
                    <div class="hidden sm:items-center sm:ml-6 space-x-8 sm:-my-px sm:flex">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <x-nav-link class="text-white">
                        {{ __('Users Management') }}
                   </x-nav-link>
                    </x-slot>
    
                    <x-slot name="content">
                    <x-dropdown-link class="text-dark" :href="route('instructor.index')">
                            {{ __('Personal Trainers') }}
                        </x-dropdown-link>

                    <x-dropdown-link class="text-dark" :href="route('clients.index')">
                            {{ __('Clients') }}
                        </x-dropdown-link>

                        <x-dropdown-link class="text-dark" :href="route('admin.index')">
                            {{ __('Admins') }}
                        </x-dropdown-link>

                    </x-slot>
                </x-dropdown>
            </div>

                    <x-nav-link class="text-white" :href="route('appointments.index')" :active="request()->routeIs('appointments')">
                        {{ __('Appointments') }}
                    </x-nav-link>
                    <x-nav-link class="text-white" :href="route('payments.index')" :active="request()->routeIs('payments')">
                        {{ __('Payments') }}
                    </x-nav-link>
                    <x-nav-link class="text-white" :href="route('feedback.index')" :active="request()->routeIs('feedback')">
                        {{ __('Feedbacks') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm leading-4 font-medium rounded-md ">
                            <div class="text-white">{{ Auth::guard('admin')->user()->firstname}} {{ Auth::guard('admin')->user()->lastname}}</div>

                            <div class="ml-1 text-white">
                                <svg class="fill-current h-4 w-4 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link class="text-dark" :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link  class="text-dark" :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-dark dark:hover:bg-dark focus:outline-none focus:bg-dark  dark:focus:bg-dark  focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">

                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

  
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden items-center mt-2 space-y-1 ">
    <div class="pt-2 pb-3 space-y-1">
        <!-- Dropdown Header -->
        <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin')">
            {{ __('Dashboard') }}
        </x-responsive-nav-link>
        
 
        <div x-data="{ open: false }">
        <x-responsive-nav-link>
            <button @click="open = !open" class="group flex  w-full text-left">
                <span>{{ __('Manage Users') }}</span>
                <svg :class="{ 'transform rotate-180': open, 'transform rotate-0': !open }" class="w-5 h-5 group-hover:text-primary-400 transition-transform transform-gpu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
                </x-responsive-nav-link>
            <!-- Dropdown Content -->
            <div :class="{'block': open, 'hidden': !open}" class="hidden mt-2 space-y-1 text-white">
                <x-responsive-nav-link :href="route('instructor.index')">
                    {{ __('Instructors') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('clients.index')">
                    {{ __('Clients') }}
                </x-responsive-nav-link>

                <x-responsive-nav-link :href="route('admin.index')">
                    {{ __('Admins') }}
                </x-responsive-nav-link>
            </div>
            <!-- End of Dropdown Content -->
        </div>
   
        

        <x-responsive-nav-link :href="route('appointments.index')" :active="request()->routeIs('appointments')">
            {{ __('Appointments') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('payments.index')" :active="request()->routeIs('payments')">
            {{ __('Payments') }}
        </x-responsive-nav-link>

        <x-responsive-nav-link :href="route('feedback.index')" :active="request()->routeIs('feedback')">
            {{ __('Feedbacks') }}
        </x-responsive-nav-link>
        <!-- End of Other Menu Items -->
    </div>



        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-white dark:text-gray-200">{{ Auth::guard('admin')->user()->firstname}} {{ Auth::guard('admin')->user()->lastname}}</div>
                <div class="font-medium text-sm text-white">{{ Auth::guard('admin')->user()->email}}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
