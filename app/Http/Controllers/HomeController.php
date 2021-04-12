<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use Illuminate\Contracts\Support\Renderable;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('welcome');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome()
    {
            $categories = Category::all();
            $products = Product::paginate(16);
            return view('welcome',[
                'products'=>$products,
                'categories'=>$categories
            ]);            

    }

    public function show($id)
    {
            $product = Product::findOrFail($id);
            return view('products.show',[
                'product'=>$product
            ]);
    }

    public function contact(){
        return view('contact');
    }


}
