<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Inventario</title>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ $header }}
                </h2>
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            <div class="py-12 flex items-center">
                @if (isset($nuevo))
                <div class="max-w-7xl mx-auto flex items-center content-center">
                    <a href="{{ $nuevo }}"><button class="bg-blue-500 rounded-lg p-2 text-blue-50">Añadir</button></a>
                </div>
                @endif
                @if(isset($extras))
                <div class="max-w-7xl mx-auto flex items-center content-center gap-4">

                    {{ $extras }}

                </div>
                @endif

            </div>
            <div class="mx-auto sm:px-6 lg:px-8 max-w-fit">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        {{ $slot }}
                    </div>
                </div>
            </div>

        </main>
    </div>
</body>

</html>