<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Static book data
        $books = [
            (object)[
                'title' => 'The Great Gatsby',
                'author' => 'F. Scott Fitzgerald',
                'price' => 12.99,
                'cover_image' => 'atomic_habits.jpg'
            ],
            (object)[
                'title' => 'To Kill a Mockingbird',
                'author' => 'Harper Lee',
                'price' => 14.99,
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80'
            ],
            (object)[
                'title' => '1984',
                'author' => 'George Orwell',
                'price' => 13.99,
                'cover_image' => 'https://images.unsplash.com/photo-1544947950-fa07a98d237f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=500&q=80'
            ],
        ];
        // search
        $search = request()->input('search');
        if ($search) {
            $books = array_filter($books, function ($book) use ($search) {
                return stripos($book->title, $search) !== false || stripos($book->author, $search) !== false;
            });
        }
        return view('shop', ['books' => $books]);
    }
}

