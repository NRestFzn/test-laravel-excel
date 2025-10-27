<?php

namespace App\Imports;

use App\Models\Book;
use Maatwebsite\Excel\Concerns\ToModel;

class BookImport implements ToModel
{
    public function model(array $row)
    {
        return new Book([
            'title' => $row[0],
            'writer' => $row[1],
            'category' => $row[2],
        ]);
    }
}
