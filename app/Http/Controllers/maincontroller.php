<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\UlasanBuku;
use App\Peminjaman;

class maincontroller extends Controller
{
    public function index()
    {
        $jumlahbuku = Buku::count();
        $jumlahpeminjaman = Peminjaman::count();
        return view('main', compact('jumlahbuku','jumlahpeminjaman'));
    }

    
    // public function search(Request $request)
    // {
    //     $keyword = $request->input('search');
    //     $bukus = Buku::where('judul', 'LIKE', "%$keyword%")
    //         ->orWhere('penulis', 'LIKE', "%$keyword%")
    //         ->get();
    //     $message = $bukus->isEmpty() ? 'Maaf, produk tidak ditemukan.' : null;

    //     return view('home', compact('bukus'));
    // }
}
