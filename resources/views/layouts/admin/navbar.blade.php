<div class="bg-white border-b px-6 py-4 flex justify-between items-center">

    {{-- search --}}
    <div class="w-1/3">
        <input type="text" placeholder="جستجو..."
            class="w-full px-3 py-2 border rounded-xl focus:outline-none focus:ring">
    </div>

    {{-- right side --}}
    <div class="flex items-center gap-4">

        {{-- notifications --}}
        <button class="relative">
            🔔
            <span class="absolute -top-1 -left-1 bg-red-500 text-white text-xs px-1 rounded-full">3</span>
        </button>

        {{-- user --}}
        <div class="flex items-center gap-2">
            <div class="w-8 h-8 bg-gray-300 rounded-full"></div>
            <span class="text-sm">{{ auth()->user()->name }}</span>
        </div>

    </div>
</div>
