<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    {{-- font tajawal --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    {{-- datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.0/css/dataTables.dataTables.css" />
    {{-- fontawesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    {{-- css style --}}
    <link rel="stylesheet" href="{{ asset('build/assets/style.css') }}">
</head>

<body class="" dir="rtl" style="text-align: right">
    <x-banner />

    <div class="min-h-screen bg-gray-100">
        {{-- @livewire('navigation-menu') --}}
        @include('Admin.layouts.navbar', ['title' => $header ?? ''])
        @include('Admin.layouts.sidebar')
        <!-- Page Heading -->

        <!-- Page Content -->
        <div class="p-4 sm:mr-64 mt-14">

            {{-- @if (isset($header))
                <header class="">
                    <div class="max-w-7xl mx-auto py-6">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}
            {{ $slot }}
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- datatable --}}
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json"
                }
            });
        });
    </script>


    <script>
        // const sidebar = document.getElementById("logo-sidebar");
        // const toggleButton = document.getElementById("sidebar-toggle");

        // // toggle sidebar
        // toggleButton.addEventListener("click", () => {
        //     sidebar.classList.toggle("-translate-x-full");
        // });
    </script>

    @stack('modals')

    @livewireScripts




</body>

</html>
