<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = "kategori_buku";
    protected $fillable =[
        'nama_kategori',

    ];
}
