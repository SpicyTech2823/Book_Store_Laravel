<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Static book data
        $books = [
            (object)[
                'id' => 1,
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'price' => 12.99,
                'cover_image' => 'atomic_habits.jpg',
                'description' => 'A novel about the American dream and the decadence of the Jazz Age. '
            ],
            (object)[
                'id' => 2,
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'price' => 14.99,
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80',
                'description' => 'A gripping tale of racial injustice and childhood innocence in the American South. '
            ],
            (object)[
                'id' => 3,
                'title' => '1984',
                'author' => 'George Orwell',
                'price' => 13.99,
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80',
                'description' => 'A dystopian social science fiction novel and one of the most prominent anti-totalitarian works of the twentieth century. '
            ],
        ];
        return view('home', compact('books'));
    }
    public function show($id)
    {
        // Static book data
        $books = [
            (object)[
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'price' => 12.99,
                'cover_image' => 'atomic_habits.jpg',
                'description' => 'A novel about the American dream and the decadence of the Jazz Age. '
            ],
            (object)[
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'price' => 14.99,
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80',
                'description' => 'A gripping tale of racial injustice and childhood innocence in the American South. '
            ],
            (object)[
                'title' => '1984',
                'author' => 'George Orwell',
                'price' => 13.99,
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80',
                'description' => 'A dystopian social science fiction novel and one of the most prominent anti-totalitarian works of the twentieth century. '
            ],
        ];
        $book = collect($books)->firstWhere('id', $id);
        return view('books.show', compact('book'));

    }
}
