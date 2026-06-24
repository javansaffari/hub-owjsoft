<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>پنل مدیریت</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-50 text-gray-800">

    <div class="flex min-h-screen">

        {{-- SIDEBAR --}}
        @include('layouts.admin.sidebar')

        {{-- MAIN --}}
        <div class="flex-1 flex flex-col">

            {{-- TOPBAR --}}
            @include('layouts.admin.navbar')

            {{-- CONTENT --}}
            <main class="bg-white border-b px-6 py-4 m-6 rounded-md">
                @yield('content')
            </main>

        </div>

    </div>

</body>

</html>
