<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\UlasanBuku;
use Illuminate\Support\Facades\Auth;

class ulasanbukucontroller extends Controller
{
public function create($BukuID)
{
    $buku = Buku::findOrFail($BukuID);
    // Memuat ulasan yang terkait dengan buku yang dipilih
    $ulasan = UlasanBuku::where('BukuID', $BukuID)->get();
    return view('pengguna.ulasan', compact('buku', 'ulasan'));
}
    
public function store(Request $request)
{
    $request->validate([
        'BukuID' => 'required|exists:buku,id',
        'ulasan' => 'required|string',
        'rating' => 'required|integer|between:1,5',
    ]);

    // Proses penyimpanan ulasan ke dalam database
    UlasanBuku::create([
        'ulasan' => $request->ulasan,
        'rating' => $request->rating,
        'UserID' => Auth::id(),
        'BukuID' => $request->BukuID,
    ]);

    // Setelah ulasan disimpan, Anda bisa melakukan redirect atau menampilkan pesan sukses
    return redirect()->back()->with('success', 'Ulasan berhasil disimpan.');
}

}

