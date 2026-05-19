<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class CartController extends Controller
{
    private function getBookById($id)
    {
        return Book::find($id);
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
