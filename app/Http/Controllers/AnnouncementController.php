<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\categories;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Halaman Utama: Menampilkan List Pengumuman
    public function index(Request $request)
    {
        $query = Announcement::with('category')->latest();

        // Filter berdasarkan kategori jika ada
        if ($request->has('category') && $request->category) {
            $query->where('category_id', $request->category);
        }

        $announcements = $query->paginate(9);
        $categories = categories::all(); // Mengambil semua kategori untuk filter

        return view('announcements.index', compact('announcements', 'categories'));
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
