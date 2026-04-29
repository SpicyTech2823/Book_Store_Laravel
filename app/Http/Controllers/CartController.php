<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    private function getBookById($id)
    {
        $book = Book::find($id);
        if ($book) {
            return $book;
        }

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

        return collect($books)->firstWhere('id', $id);
    }

    public function add(Request $request, $id){
       $book = $this->getBookById($id);
       if (!$book) {
           abort(404, 'Book not found');
       }

       $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $book->title,
                "price" => $book->price,
                "quantity" => 1
           ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Added to cart!');
    }
    public function index(){
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function increase($id){
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Quantity updated!');
    }

    public function decrease($id){
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            if($cart[$id]['quantity'] > 1) {
                $cart[$id]['quantity']--;
            } else {
                unset($cart[$id]);
            }
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Quantity updated!');
    }

    public function remove($id){
        $cart = session()->get('cart', []);

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Item removed from cart!');
    }
    public function showCheckout(){
        $cart = session()->get('cart', []);
        return view('checkout', compact('cart'));
    }
    public function checkout(){
        // Here you would typically handle payment processing and order creation
        
        session()->forget('cart');
        return redirect()->route('home')->with('success', 'Checkout successful!');
    }
}
