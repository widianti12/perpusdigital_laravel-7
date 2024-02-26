<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = "peminjaman";
    protected $fillable =[
        'UserID',
        'BukuID',
        'tanggal_peminjaman',
        'tanggal_pengembalian',
        'status_peminjaman',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID', 'id');
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'BukuID', 'id');
    }
}
