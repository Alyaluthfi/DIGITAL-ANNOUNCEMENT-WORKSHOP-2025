<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang | Papan Pengumuman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        html, body {
            height: 100%;
        }

        .welcome-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
            width: 100%;
            max-width: 600px;
        }

        .welcome-card:hover {
            transform: translateY(-5px);
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.02); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>
    <div class="welcome-card pulse">
        <div class="p-8 md:p-12">
            <!-- Header -->
            <div class="text-center mb-10">
                <div class="w-20 h-20 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9m0 0v3m0-3a2 2 0 012-2h2a2 2 0 012 2m0 0V6a2 2 0 00-2-2H9a2 2 0 00-2 2v3" />
                    </svg>
                </div>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800">Selamat Datang!</h1>
                <p class="text-lg text-gray-600 mt-2">Selamat datang di Papan Pengumuman Kampus</p>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="flex items-start">
                    <div class="bg-green-100 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Informasi Terbaru</h4>
                        <p class="text-sm text-gray-600">Akses pengumuman terkini dari kampus</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-blue-100 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Kategori Lengkap</h4>
                        <p class="text-sm text-gray-600">Pengumuman dikelompokkan berdasarkan kategori</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-purple-100 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Jadwal Terupdate</h4>
                        <p class="text-sm text-gray-600">Informasi dengan tanggal dan waktu terbaru</p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="bg-yellow-100 p-2 rounded-lg mr-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-medium text-gray-800">Notifikasi</h4>
                        <p class="text-sm text-gray-600">Dapatkan pemberitahuan untuk informasi penting</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="text-center">
                <p class="text-gray-600 mb-6">Silakan pilih tindakan yang diinginkan:</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button id="enterBtn" class="px-8 py-3 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition duration-300 shadow-lg">
                        Masuk ke Pengumuman
                    </button>
                    <button id="laterBtn" class="px-8 py-3 bg-gray-200 text-gray-800 rounded-lg font-medium hover:bg-gray-300 transition duration-300">
                        Nanti Saja
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        const enterBtn = document.getElementById('enterBtn');
        const laterBtn = document.getElementById('laterBtn');

        // Enter button - redirect to announcements
        enterBtn.addEventListener('click', () => {
            // Tampilkan loading state
            enterBtn.innerHTML = `
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Memuat...
            `;
            enterBtn.disabled = true;

            // Redirect setelah delay singkat untuk menunjukkan loading
            setTimeout(() => {
                redirectToAnnouncements();
            }, 1000);
        });

        // Later button - show confirmation
        laterBtn.addEventListener('click', () => {
            // Ganti teks tombol
            laterBtn.textContent = 'Tetap di Halaman Ini';

            // Tambahkan pesan konfirmasi
            const message = document.createElement('p');
            message.className = 'text-green-600 mt-4 text-sm';
            message.textContent = 'Anda dapat masuk kapan saja dengan menekan tombol "Masuk ke Pengumuman".';
            document.querySelector('.text-center').appendChild(message);

            // Hapus pesan setelah 5 detik
            setTimeout(() => {
                if (message.parentNode) {
                    message.remove();
                }
            }, 5000);
        });

        function redirectToAnnouncements() {
            window.location.href = "{{ route('announcements.index') }}";
        }
    </script>
</body>
</html>
