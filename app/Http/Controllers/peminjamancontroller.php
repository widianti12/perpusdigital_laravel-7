<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peminjaman;
use App\Buku;
use App\User;
use Carbon\Carbon;
use PDF;

use Illuminate\Support\Facades\Auth;

class peminjamancontroller extends Controller
{

    public function downloadpdfpeminjaman()
    {
    $historypeminjam = Peminjaman::all();
    $pdf = PDF::loadview('peminjaman.laporanpeminjaman',['historypeminjam'=> $historypeminjam])->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->download('laporanpeminjaman.pdf');
    }

    public function historypeminjaman()
    {
        $historypeminjam = Peminjaman::where('UserID', Auth::user()->id)->where('status_peminjaman','0')->get();
        return view('peminjaman.peminjaman', compact('historypeminjam'));
    }

    public function historypengembalian()
    {
        $historykembali = Peminjaman::where('status_peminjaman', '1')->orderBy('created_at', 'desc')->paginate(10);
        return view('peminjaman.pengembalian', compact('historykembali'));
    }

    public function pinjam($id)
    {        
        // $user = User::all();
        $buku = Buku::where('id', $id)->first();
        // $peminjaman = Peminjaman::all();

        return view('peminjaman.create', compact('buku'));
    }

   
    public function peminjamanbuku(Request $request)
    {
            $request->validate([
                'id' => 'required',
            ]);

         $buku = Buku::find($request->id);
    
        $tanggal_peminjaman = Carbon::now();
        $tanggal_pengembalian = $tanggal_peminjaman->copy()->addDays(7);
    

        // Cek apakah user sudah meminjam buku yang sama
        $cekpeminjaman = Peminjaman::where('UserID', Auth::id())
        ->where('BukuID', $request->id)
        ->where('status_peminjaman', '0')
        ->exists();

        if ($cekpeminjaman) {
            return redirect()->back()->with('warning', 'Buku tersebut sudah anda pinjam');
        }
            // Mengurangi stok buku hanya jika peminjaman berhasil dibuat
            $peminjaman = Peminjaman::create([
                'UserID' => Auth::id(),
                'BukuID' => $buku->id,
                'tanggal_peminjaman' => Carbon::now(),
                'tanggal_pengembalian' => Carbon::now()->addDays(7),
                'status_peminjaman' => 0,
            ]);
    
              // Kurangi stok buku
        $buku->decrement('stok');
            // // Hanya mengurangi stok jika peminjaman berhasil dibuat
            // if ($peminjaman) {
            //     $buku->decrement('stok');
                return redirect('/historypeminjaman')->with(['success' => 'Peminjaman berhasil ditambahkan']);
            // } else {
            //     // Rollback jika peminjaman gagal
            //     return redirect()->route('koleksi')->with('success', 'Gagal membuat peminjaman');
            // }
        }
    
    
    public function pengembalianbuku(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->id);

        $peminjaman->status_peminjaman = 1 ;
        $buku = $peminjaman->buku;

        // / Tambahkan stok buku
        $buku = Buku::find($peminjaman->BukuID);
        $buku->increment('stok');

        $peminjaman->save();


        return redirect()->back()->with('success', 'Buku berhasil dikembalikan.');
    }


}
