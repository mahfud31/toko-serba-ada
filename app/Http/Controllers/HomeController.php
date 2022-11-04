<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Carousel;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousels = Carousel::all();
        $categories = Category::take(7)->get();
        $products = Product::with('galleries')->take(8)->latest()->get();

        return view('pages.home', [
            'carousels' => $carousels,
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}
