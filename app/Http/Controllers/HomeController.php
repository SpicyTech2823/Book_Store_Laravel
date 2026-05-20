<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Testimonial;
use App\Models\FAQ;
use App\Models\CompanyInfo;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        $testimonials = Testimonial::all();
        $faqs = FAQ::all();

        $companyInfo = [];
        foreach (CompanyInfo::all() as $info) {
            $companyInfo[$info->type] = $info->value;
        }

        return view('home', compact('books', 'categories', 'testimonials', 'faqs', 'companyInfo'));
    }
}
