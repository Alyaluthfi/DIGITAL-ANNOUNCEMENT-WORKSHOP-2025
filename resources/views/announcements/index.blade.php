<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pengumuman Sekolah/Kampus</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.app')

        @section('content')
        <div class="container mx-auto px-4 py-12">

            <!-- Hero Section Pengumuman -->
            <header class="text-center mb-10 bg-white p-8 rounded-lg shadow-lg border-b-4 border-indigo-500">
                <h1 class="text-4xl font-bold text-gray-800">Papan Pengumuman Sekolah/Kampus</h1>
                <p class="text-lg text-gray-500 mt-2">Daftar lengkap informasi dan berita terbaru.</p>
            </header>

            <!-- Filter Kategori - Modern Dropdown -->
            <div class="mb-8 bg-white p-6 rounded-lg shadow-md">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div class="flex-1">
                        <h2 class="text-lg font-semibold text-gray-700 mb-2">Filter Pengumuman</h2>

                        <!-- Info Filter Aktif -->
                        @if(request('category'))
                            @php
                                $activeCategory = $categories->firstWhere('id', request('category'));
                            @endphp
                            <div class="flex items-center gap-2 mt-2">
                                <span class="text-sm text-gray-600">Kategori aktif:</span>
                                <span class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-800 rounded-full text-sm font-medium">
                                    {{ $activeCategory->name ?? 'Tidak Diketahui' }}
                                    <button onclick="clearFilter()" class="ml-2 text-indigo-600 hover:text-indigo-800">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </span>
                            </div>
                        @endif
                    </div>

                    <!-- Modern Dropdown Container -->
                    <div class="relative w-full md:w-64">
                        <button
                            id="dropdownButton"
                            class="w-full flex justify-between items-center p-3 border border-gray-300 rounded-lg shadow-sm hover:border-gray-400 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-white transition duration-200"
                            onclick="toggleDropdown()"
                        >
                            <span id="selectedCategory">
                                @if(request('category'))
                                    {{ $categories->firstWhere('id', request('category'))->name ?? 'Pilih Kategori' }}
                                @else
                                    Semua Kategori
                                @endif
                            </span>
                            <svg class="h-5 w-5 text-gray-400 transition-transform duration-200" id="dropdownArrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            id="dropdownMenu"
                            class="absolute hidden w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-10 max-h-60 overflow-y-auto"
                        >
                            <div class="py-1">
                                <button
                                    onclick="selectCategory('', 'Semua Kategori')"
                                    class="w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700 {{ !request('category') ? 'bg-indigo-50 text-indigo-700' : '' }}"
                                >
                                    Semua Kategori
                                </button>

                                @foreach($categories as $category)
                                    <button
                                        onclick="selectCategory('{{ $category->id }}', '{{ $category->name }}')"
                                        class="w-full text-left px-4 py-2 hover:bg-gray-100 text-gray-700 {{ request('category') == $category->id ? 'bg-indigo-50 text-indigo-700' : '' }}"
                                    >
                                        {{ $category->name }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grid Pengumuman -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Logika untuk menampilkan data Pengumuman --}}
                @forelse ($announcements as $announcement)
                    <div class="bg-white rounded-xl shadow-lg hover:shadow-xl overflow-hidden transition duration-300">
                        <div class="p-6">
                            <!-- Kategori & Tanggal -->
                            <div class="flex justify-between items-center text-sm mb-3">
                                <span class="font-semibold px-3 py-1 bg-indigo-100 text-indigo-700 rounded-full">
                                    {{ $announcement->category->name }}
                                </span>
                                <span class="text-gray-500">
                                    {{ \Carbon\Carbon::parse($announcement->date)->locale('id')->isoFormat('D MMM YYYY') }}
                                </span>
                            </div>

                            <!-- Judul -->
                            <h2 class="text-xl font-bold text-gray-900 mt-2 hover:text-indigo-600 line-clamp-2">
                                <a href="{{ route('announcements.show', $announcement->slug) }}">
                                    {{ $announcement->title }}
                                </a>
                            </h2>

                            <!-- Ringkasan Konten -->
                            <p class="text-gray-600 text-sm mt-3 line-clamp-3">
                                {{ Str::limit(strip_tags($announcement->content), 150) }}
                            </p>

                            <!-- Link Detail -->
                            <div class="mt-4 pt-4 border-t border-gray-100">
                                <a href="{{ route('announcements.show', $announcement->slug) }}" class="text-indigo-600 font-semibold hover:text-indigo-800 text-sm flex items-center">
                                    Baca Selengkapnya &rarr;
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-xl text-gray-600 col-span-full p-10 bg-white rounded-xl shadow-md">
                        @if(request('category'))
                            Tidak ada pengumuman dalam kategori yang dipilih.
                        @else
                            Belum ada pengumuman terbaru saat ini. Silakan cek lagi nanti.
                        @endif
                    </p>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($announcements->hasPages())
                <div class="mt-10">
                    {{ $announcements->appends(request()->query())->links() }}
                </div>
            @endif
        </div>

        <script>
        let dropdownOpen = false;

        function toggleDropdown() {
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownArrow = document.getElementById('dropdownArrow');

            dropdownOpen = !dropdownOpen;

            if (dropdownOpen) {
                dropdownMenu.classList.remove('hidden');
                dropdownArrow.classList.add('rotate-180');
            } else {
                dropdownMenu.classList.add('hidden');
                dropdownArrow.classList.remove('rotate-180');
            }
        }

        function selectCategory(categoryId, categoryName) {
            document.getElementById('selectedCategory').textContent = categoryName;
            toggleDropdown(); // Tutup dropdown

            const url = new URL(window.location.href);

            if (categoryId) {
                url.searchParams.set('category', categoryId);
            } else {
                url.searchParams.delete('category');
            }

            // Reset to page 1 when changing category
            url.searchParams.delete('page');

            window.location.href = url.toString();
        }

        function clearFilter() {
            window.location.href = "{{ route('announcements.index') }}";
        }

        // Tutup dropdown ketika klik di luar
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdownMenu');
            const button = document.getElementById('dropdownButton');

            if (!button.contains(event.target) && !dropdown.contains(event.target)) {
                dropdown.classList.add('hidden');
                document.getElementById('dropdownArrow').classList.remove('rotate-180');
                dropdownOpen = false;
            }
        });
        </script>

        <style>
        .rotate-180 {
            transform: rotate(180deg);
        }
        </style>
        @endsection
    </body>
</html>
