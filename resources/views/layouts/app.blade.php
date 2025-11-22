<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendidikan Digital | Pengumuman Sekolah</title>
    <!-- Memuat Tailwind CSS via CDN untuk styling cepat dan responsif -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menggunakan font Inter untuk tampilan modern */
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    
    <!-- Header/Navigation Bar -->
    <header class="bg-indigo-700 shadow-md">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ url('/') }}" class="text-xl font-extrabold text-white tracking-wider">
                Digital Announcement
            </a>
            <nav>
                <a href="{{ url('/pengumuman') }}" class="text-white hover:text-indigo-200 px-3 py-2 rounded-lg transition duration-150">
                    Semua Pengumuman
                </a>
                <a href="{{ url('/admin') }}" class="bg-indigo-500 text-white px-3 py-2 rounded-lg hover:bg-indigo-600 transition duration-150">
                    Admin
                </a>
            </nav>
        </div>
    </header>

    <!-- Konten Utama Ditempatkan di sini -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white mt-auto py-6">
        <div class="container mx-auto px-4 text-center text-sm">
            &copy; {{ date('Y') }} Project Challenge | Sistem Pengumuman Digital
        </div>
    </footer>
    
</body>
</html>