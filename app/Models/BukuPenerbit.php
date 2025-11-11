<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuPenerbit extends Model
{
    protected $table = 'buku_penerbits';

    protected $fillable = [
        'buku_id',
        'penerbit_id',
    ];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}
