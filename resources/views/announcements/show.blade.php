@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <a href="{{ route('announcements.index') }}" class="text-indigo-600 hover:text-indigo-800 mb-4 inline-block">&larr; Kembali ke Daftar Pengumuman</a>

    <article class="bg-white rounded-lg shadow-xl p-8">
        <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $announcement->title }}</h1>

        <div class="flex items-center text-gray-500 text-sm mb-6 space-x-4">
            <span>Kategori: <strong class="text-indigo-600">{{ $announcement->category }}</strong></span>
            <span>Tanggal: {{ \Carbon\Carbon::parse($announcement->date)->locale('id')->isoFormat('D MMMM YYYY') }}</span>
        </div>

        <div class="prose max-w-none leading-relaxed text-gray-800 border-t pt-6">
            {{-- Konten yang disimpan dari Rich Editor Filament akan ditampilkan di sini --}}
            {!! $announcement->content !!}
        </div>

        @if ($announcement->attachment)
            <div class="mt-8 p-4 bg-yellow-50 border-l-4 border-yellow-500 text-yellow-700 rounded">
                <p class="font-bold">Lampiran Tersedia:</p>
                <a href="{{ asset('storage/' . $announcement->attachment) }}" target="_blank" class="text-yellow-800 underline hover:text-yellow-900">
                    Unduh Lampiran (File)
                </a>
                {{-- Anda harus memastikan storage link sudah dibuat: php artisan storage:link --}}
            </div>
        @endif

    </article>
</div>
@endsection
