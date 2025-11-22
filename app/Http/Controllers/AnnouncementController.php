<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Halaman Utama: Menampilkan List Pengumuman
    public function index()
    {
        $announcements = Announcement::orderBy('date', 'desc')->paginate(10); // Ambil 10 data per halaman

        return view('announcements.index', compact('announcements'));
    }

    // Halaman Detail: Menampilkan Isi Pengumuman
    public function show(string $slug)
    {
        $announcement = Announcement::where('slug', $slug)->firstOrFail();

        return view('announcements.show', compact('announcement'));
    }

    // Halaman Dashboard: Menampilkan Pesan Selamat Datang
    public function welcome()
    {
        return view('announcements.welcome');
    }
}
