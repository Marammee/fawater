<x-app-layout>
    <x-slot name="header"> {{ __('القائمة الرئيسية') }} </x-slot>
    <div class="max-w-7xl py-6">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('الاحصائيات') }}
        </h2>
    </div>
    <div class="grid sm:grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                <p class="text-2xl text-gray-400 dark:text-gray-500">20</p>
            </div>
            <div class="">
                <svg class="flex-shrink-0 w-10 h-10 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                <p class="text-2xl text-gray-400 dark:text-gray-500">20</p>
            </div>
            <div class="">
                <svg class="flex-shrink-0 w-10 h-10 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                <p class="text-2xl text-gray-400 dark:text-gray-500">20</p>
            </div>
            <div class="">
                <svg class="flex-shrink-0 w-10 h-10 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                </svg>
            </div>
        </div>
    </div>

    <div class="max-w-7xl py-6">
        <h2 class="font-semibold text-xl text-gray-800">
            {{ __('اخر المصاريف') }}
        </h2>
    </div>
    <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 mb-4">
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <div class="mb-10">
                    <a href="#" class="block">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                    </a>
                </div>
                <div class="flex items-center justify-between gap-5">
                    <p class="text-xs text-gray-400">في : 2024/10/22 8:23AM</p>
                    <p class="text-xs text-gray-400">50 SAR</p>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('images/FigmaCourses 1.png') }}" alt="">
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <div class="mb-10">
                    <a href="#" class="block">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                    </a>
                </div>
                <div class="flex items-center justify-between gap-5">
                    <p class="text-xs text-gray-400">في : 2024/10/22 8:23AM</p>
                    <p class="text-xs text-gray-400">50 SAR</p>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('images/FigmaCourses 1.png') }}" alt="">
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <div class="mb-10">
                    <a href="#" class="block">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                    </a>
                </div>
                <div class="flex items-center justify-between gap-5">
                    <p class="text-xs text-gray-400">في : 2024/10/22 8:23AM</p>
                    <p class="text-xs text-gray-400">50 SAR</p>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('images/FigmaCourses 1.png') }}" alt="">
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <div class="mb-10">
                    <a href="#" class="block">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                    </a>
                </div>
                <div class="flex items-center justify-between gap-5">
                    <p class="text-xs text-gray-400">في : 2024/10/22 8:23AM</p>
                    <p class="text-xs text-gray-400">50 SAR</p>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('images/FigmaCourses 1.png') }}" alt="">
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <div class="mb-10">
                    <a href="#" class="block">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                    </a>
                </div>
                <div class="flex items-center justify-between gap-5">
                    <p class="text-xs text-gray-400">في : 2024/10/22 8:23AM</p>
                    <p class="text-xs text-gray-400">50 SAR</p>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('images/FigmaCourses 1.png') }}" alt="">
            </div>
        </div>
        <div class="flex items-center justify-between p-4 rounded bg-gray-50">
            <div class="">
                <div class="mb-10">
                    <a href="#" class="block">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">المستخدمين </p>
                    </a>
                </div>
                <div class="flex items-center justify-between gap-5">
                    <p class="text-xs text-gray-400">في : 2024/10/22 8:23AM</p>
                    <p class="text-xs text-gray-400">50 SAR</p>
                </div>
            </div>
            <div class="">
                <img src="{{ asset('images/FigmaCourses 1.png') }}" alt="">
            </div>
        </div>
    </div>
</x-app-layout>
