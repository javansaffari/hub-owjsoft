<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'پنل مدیریت')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>


<body class="bg-slate-100">

    <div x-data="{ sidebarOpen: false }" class="min-h-screen">

        @include('layouts.admin.sidebar')

        <div class="lg:pr-72">

            @include('layouts.admin.header')

            <main class="p-4 lg:p-6">

                <div class="bg-white p-10 rounded-2xl border !border-[#DEDFE0]">

                    <div
                        class="bg-white border border-slate-200 rounded-2xl p-6 flex items-center justify-between mb-6">

                        <h1 class="text-lg font-bold">
                            @yield('title')
                        </h1>

                        <div>
                            @yield('action')
                        </div>


                    </div>

                    @yield('content')
                </div>
            </main>

        </div>
    </div>

    @livewireScripts

</body>

</html>
