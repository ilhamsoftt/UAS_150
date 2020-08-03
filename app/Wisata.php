<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    protected $table="tempat_wisata";
    protected $fillable = [
        'nama', 'slug', 'alamat', 'gambar','keterangan',
    ];
}
