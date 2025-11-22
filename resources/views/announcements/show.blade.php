@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-12 max-w-5xl">
    <a href="{{ route('announcements.index') }}" class="text-indigo-600 hover:text-indigo-800 mb-6 inline-block font-medium flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Daftar Pengumuman
    </a>

    <article class="bg-white rounded-2xl shadow-2xl p-8 lg:p-10 border-t-8 border-indigo-500">

        <!-- Metadata -->
        <div class="flex flex-wrap items-center text-gray-500 text-sm mb-6 space-x-4 border-b pb-4">
            <span class="font-semibold text-indigo-700 bg-indigo-50 px-3 py-1 rounded-full">
                Kategori: {{ $announcement->category->name }}
            </span>
            <span>Tanggal Terbit: {{ \Carbon\Carbon::parse($announcement->date)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
        </div>

        <!-- Judul -->
        <h1 class="text-4xl lg:text-5xl font-extrabold text-gray-900 mb-6 leading-tight">
            {{ $announcement->title }}
        </h1>


        <!-- Isi Konten -->
        <div class="prose prose-indigo max-w-none leading-relaxed text-gray-800 pt-6">
            {{-- Karena di Form kita pakai Textarea sederhana, kita tampilkan sebagai teks biasa.
                 Jika Rich Editor digunakan, ganti menjadi {!! $announcement->content !!} --}}
            <p>{{ $announcement->content }}</p>
        </div>

        <!-- Lampiran (Jika Ada) -->
        @if ($announcement->attachment)
            <div class="mt-10 p-6 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-800 rounded-lg">
                <p class="font-bold mb-4 flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.414a1 1 0 00-1.414-1.414l-6.414 6.414a2 2 0 01-2.828-2.828l6.586-6.586a4 4 0 115.656 5.656l-6.586 6.586a2 2 0 01-2.828-2.828l6.586-6.586M9 13l4-4"></path></svg>
                    Pratinjau Dokumen Lampiran
                </p>

                {{-- Cek apakah file adalah PDF untuk menampilkan viewer --}}
                @if (Str::endsWith($announcement->attachment, ['.pdf', '.PDF']))
                    <div class="mt-4 w-full" style="height: 600px;">
                        <iframe
                            src="{{ asset('storage/' . $announcement->attachment) }}"
                            style="width:100%; height:100%; border:none;">
                        </iframe>
                    </div>
                @else
                    {{-- Jika bukan PDF, tampilkan link unduhan biasa --}}
                    <p class="text-sm text-gray-600 mb-2">Dokumen tidak dapat dipratinjau, silakan unduh.</p>
                    <a href="{{ asset('storage/' . $announcement->attachment) }}" target="_blank" class="text-yellow-900 underline hover:text-yellow-700 transition duration-150 font-medium">
                        Unduh Dokumen ({{ Str::afterLast($announcement->attachment, '.') }} File)
                    </a>
                @endif
            </div>
        @endif

    </article>
</div>
@endsection
