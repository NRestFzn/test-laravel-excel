<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Book::all();
    }

    public function headings(): array
    {
        return [
            'ID Buku',
            'Judul',
            'Penulis',
            'Kategori',
        ];
    }
}
