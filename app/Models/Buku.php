<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = [
        'judul',
        'penulis_id',
        'kategori_id',
    ];

    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbits()
    {
        return $this->belongsToMany(
            Penerbit::class,
            'buku_penerbits',
        );
    }
}
