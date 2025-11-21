@extends('layouts.app') 
{{-- Asumsi Anda memiliki layout dasar di 'resources/views/layouts/app.blade.php' --}}

@section('content')
<div class="container mx-auto px-4 py-8">
    
    {{-- Hero Section --}}
    <header class="text-center mb-10">
        <h1 class="text-4xl font-bold text-gray-800">Pengumuman Terbaru</h1>
        <p class="text-xl text-gray-500 mt-2">Informasi penting dari Sekolah Digital.</p>
    </header>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse ($announcements as $announcement)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <span class="text-sm font-semibold text-indigo-600 uppercase">{{ $announcement->category }}</span>
                    <h2 class="text-2xl font-bold text-gray-900 mt-2 hover:text-indigo-600">
                        <a href="{{ route('announcements.show', $announcement->slug) }}">
                            {{ $announcement->title }}
                        </a>
                    </h2>
                    <p class="text-gray-500 text-sm mt-1">{{ \Carbon\Carbon::parse($announcement->date)->locale('id')->isoFormat('D MMMM YYYY') }}</p>
                    
                    {{-- Tampilkan ringkasan (100 karakter pertama) --}}
                    <p class="text-gray-700 mt-4">{{ Str::limit(strip_tags($announcement->content), 100) }}</p> 

                    <a href="{{ route('announcements.show', $announcement->slug) }}" class="mt-4 inline-block text-indigo-600 font-semibold hover:text-indigo-800">
                        Baca Detail &rarr;
                    </a>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-600 col-span-full">Belum ada pengumuman terbaru.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="mt-10">
        {{ $announcements->links() }}
    </div>
</div>
@endsection