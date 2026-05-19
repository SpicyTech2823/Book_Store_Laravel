<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class ShopController extends Controller
{
    public function index()
    {
        $query = Book::query();

        $search = request()->input('search');
        if ($search) {
            $query->where('title', 'like', "%$search%")
                  ->orWhere('author', 'like', "%$search%");
        }

        $books = $query->get();
        return view('shop', ['books' => $books]);
    }
}

