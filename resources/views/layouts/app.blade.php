<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengumuman</title>
    <script src="https://cdn.tailwindcss.com"></script> </head>
<body>
    
    <header class="bg-indigo-600 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">Sekolah Digital</h1>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4 text-center mt-10">
        &copy; {{ date('Y') }} Sistem Pengumuman
    </footer>
    
</body>
</html>