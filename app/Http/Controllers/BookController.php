<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'writer' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
            $validated['cover'] = $coverPath;
        }

        $book = Book::create([
            'title' => $validated['title'],
            'writer' => $validated['writer'],
            'category' => $validated['category'],
            'cover' => $validated['cover'] ?? null,
        ]);

        return redirect("/book")->with('success', 'Book added succesfully');
    }

    public function getAll()
    {
        $books = Book::all();

        return view('book.list', ['books' => $books]);
    }
}
