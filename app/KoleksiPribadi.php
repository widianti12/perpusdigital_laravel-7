<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KoleksiPribadi extends Model
{
    protected $table = "koleksi_pribadi";
    protected $fillable =[
        'UserID',
        'BukuID',
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
