<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulises';

    protected $fillable = [
        'nama',
        'email',
    ];

    public function bukus()
    {
        return $this->hasMany(Buku::class);
    }
}
