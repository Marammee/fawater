<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center">
            <!-- Sidebar Toggle and Logo -->
            <div class="flex items-center justify-start rtl:justify-end">
                <!-- Toggle Button -->
                {{-- <button id="sidebar-toggle" class="fixed top-4 left-4 z-50 p-2 text-gray-600 bg-white rounded shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button> --}}

                {{-- <button id="sidebar-toggle" data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                    aria-controls="logo-sidebar" type="button"
                    class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button> --}}

                <a href="{{ route('admin-dashboard') }}" class="flex sm:me-24">
                    <img src="{{ asset('images/logo.svg') }}" class="h-8 me-3" alt="FlowBite Logo" />
                    <span class="brand self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Fawater</span>
                </a>
            </div>
            <!-- Page Title -->
            <div class="flex items-center justify-start ">
                <span
                    class="title-sidebar-navlink self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">{{ $title }}</span>
            </div>
            <!-- User Menu -->
            <div class="flex items-center justify-between ms-auto">
                <div class="flex items-center ms-3">
                    <div>
                        <a href="{{ route('profile.show') }}"
                            class="">
                            <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                class="w-10 h-10 rounded-full" />
                        </a>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="dropdown-user">
                        <div class="px-4 py-3">
                            <p class="text-sm text-gray-900 dark:text-white">Neil Sims</p>
                            <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300">
                                neil.sims@flowbite.com
                            </p>
                        </div>
                        <ul class="py-1">
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Dashboard</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Earnings</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">Sign
                                    out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
