<?php

namespace App\Exports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $bukus = Book::all();

        return $bukus;
    }

    public function headings(): array
    {
        return [
            'id',
            'warna cover',
        ];
    }
}
