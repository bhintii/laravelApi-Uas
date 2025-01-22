<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('authors')->get();

        return response()->json($books);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate(Book::rules());

        $book = Book::create($validateData);

        return response()->json($book, 201);
    }
}
