@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12">

    <!-- Hero Section Pengumuman -->
    <header class="text-center mb-10 bg-white p-8 rounded-lg shadow-lg border-b-4 border-indigo-500">
        <h1 class="text-4xl font-bold text-gray-800">Papan Pengumuman Sekolah/Kampus</h1>
        <p class="text-lg text-gray-500 mt-2">Daftar lengkap informasi dan berita terbaru.</p>
    </header>

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
                Belum ada pengumuman terbaru saat ini. Silakan cek lagi nanti.
            </p>
        @endforelse
    </div>

    {{-- Pagination --}}
    @if($announcements->hasPages())
        <div class="mt-10">
            {{ $announcements->links() }}
        </div>
    @endif
</div>
@endsection
