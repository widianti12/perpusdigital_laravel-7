<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Buku;
use App\KoleksiPribadi;
use Illuminate\Support\Facades\Auth;

class koleksipribadicontroller extends Controller
{
    public function koleksi()
    {
        $koleksi = KoleksiPribadi::with('buku')->where('UserID', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('pengguna.koleksi', compact('koleksi'));
    }

    public function addkoleksi(Request $request, Buku $buku)
    {
        
        // periksa apakah buku sudah ada di koleksi
        $cekkoleksi = KoleksiPribadi::where('UserID',Auth::id())->where('BukuID', $buku->id)->first();
        if( $cekkoleksi){
            return redirect()->route('home')->with('warning', 'Buku tersebut sudah ada di Koleksi Anda');
        }else{
        // Logika untuk menambahkan buku ke koleksi
        $koleksi = KoleksiPribadi::create([
            'UserID' => Auth::id(),
            'BukuID' => $buku->id,
        ]);
        }
        return redirect()->route('home')->with('success', 'Buku berhasil ditambakan  ke Koleksi Anda!');
    }

    public function destroy ($id)
    {
        $koleksi = KoleksiPribadi::findOrFail($id);
        $koleksi->delete();

        return redirect()->route('koleksi')->with('status', 'Item removed from cart');
    }

}


