<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\KategoriBuku;
use PDF;
use Illuminate\Support\Facades\Auth;

class bukucontroller extends Controller
{
    public function index()
    {
        $bukus = Buku::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.buku.index', compact('bukus'));
    }

    public function downloadpdfbuku()
    {
    $bukus = Buku::all();
    $pdf = PDF::loadview('admin.buku.laporanbuku',['bukus'=> $bukus])->setOptions(['defaultFont' => 'sans-serif']);
    return $pdf->download('laporanbuku.pdf');
    }
    
    public function create()
    {
        $kategori = KategoriBuku::all();
        return view('admin.buku.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
    		'judul' => 'required',
    		'penulis' => 'required',
            'penerbit'=>'required',
            'tahun_terbit' => 'required',
            'gambar' => 'required',
            'stok' => 'required',
            'KategoriID'=>'required'
    	]);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $imgName);
    
        Buku::create([
    		'judul' => $request->judul,
    		'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit'=> $request->tahun_terbit,
            'gambar' => $imgName,
            'stok' => $request->stok,
            'status' => "Tersedia",
            'KategoriID'=>$request->KategoriID,
    	]);
        // // Periksa apakah stok sekarang 0
        // if ($buku->stok == 0) {
        //     // Jika stok habis, ubah status buku menjadi tidak tersedia
        //     $buku->update(['status' => 'Tidak tersedia']);
        // }
    	return redirect('/buku')->with(['status'=>'Buku  berhasil ditambahkan']);
    }


    public function show($id)
    {
        $bukus = Buku::find($id);
        return view('admin.buku.show', compact('bukus'));
    }

   
    public function edit($id)
    {
        $kategori = KategoriBuku::all();
        $buku = Buku::where('id', $id)->first();
        return view('admin.buku.edit', compact('buku','kategori'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,[
    		'judul' => 'required',
    		'penulis' => 'required',
            'penerbit'=>'required',
            'tahun_terbit' => 'required',
            'stok' => 'required',
            'KategoriID'=>'required',
    	]);

        $buku = Buku::find($id);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('image'), $imgName);
        $buku->gambar =  $imgName;
        
    		$buku->judul = $request->input('judul');
    		$buku->penulis = $request->input('penulis');
            $buku->penerbit = $request->input('penerbit');
            $buku->tahun_terbit = $request->input('tahun_terbit');
            $buku->stok = $request->input('stok');
            $buku->KategoriID = $request->input('KategoriID');
            $buku->update();
 
    	return redirect('/buku')->with(['status'=>'Buku  berhasil diubah']);
    }


    public function destroy($id)
    {
        Buku::where('id',$id)->delete();
        return redirect('buku');
    }
}
