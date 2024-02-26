<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriBuku;
class kategoribukucontroller extends Controller
{

    public function index()
    {
        $kategori = KategoriBuku::orderBy('created_at', 'desc')->paginate(8);
        return view('admin.kategori', compact('kategori'));
    }

   
    public function create()
    {
        return view('admin.kategori');
    }


    public function store(Request $request)
    {
        $this->validate($request,[
    		'nama_kategori' => 'required|unique:kategori_buku,nama_kategori'        
    	]);

        $kategori = KategoriBuku::create($request->all());

        return redirect('/kategori')->with(['status'=>'Kategori  berhasil ditambahkan']);
    }
  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        KategoriBuku::where('id',$id)->delete();
        return redirect('kategori');
    }
}
