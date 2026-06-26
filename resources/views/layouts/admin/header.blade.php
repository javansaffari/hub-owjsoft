<header class="sticky top-0 z-30 bg-white border-b border-slate-200 h-16 flex items-center justify-between px-4 lg:px-6">

    <div class="flex items-center gap-3">

        <button @click="sidebarOpen = true" class="lg:hidden">

            <svg class="w-6 h-6">
                <path stroke="currentColor" stroke-width="2" stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>

        </button>

        <h1 class="font-bold text-lg">
            مرکز خدمات مشتریان شرکت نوآوران کار و توسعه اوج
        </h1>

    </div>

    <div class="flex items-center gap-4">

        <span class="text-sm text-slate-600">
            {{ auth()->user()->name }}
        </span>

    </div>

</header>
