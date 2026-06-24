<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Title (Livewire-safe) --}}
    <title>{{ $title ?? 'عنوان ثبت نشده' . ' - ' . config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-slate-100">

    <div x-data="{ sidebarOpen: false }" class="min-h-screen">

        {{-- Sidebar --}}
        @include('layouts.customer.sidebar')

        <div class="lg:pr-72">

            {{-- Header --}}
            @include('layouts.customer.header')

            {{-- Page Content --}}
            <main class="p-4 lg:p-6">
                <h1 class="mb-3">{{ $title ?? 'عنوان ثبت نشده' }}</h1>
                <div class="bg-white p-5 rounded-lg">

                    @yield('content')

                </div>
            </main>

        </div>
    </div>

    @livewireScripts

</body>

</html>
