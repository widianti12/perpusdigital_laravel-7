<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\UlasanBuku;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $bukus = Buku::orderBy('created_at', 'desc')->paginate(8);
        $ulasan = UlasanBuku::all();
        return view('home', compact('bukus','ulasan'));
    }

   
}
